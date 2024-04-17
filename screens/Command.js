import React, { useEffect, useState } from "react";
import { View, Text, Button, TextInput, Alert } from "react-native";
import * as SecureStore from "expo-secure-store";
import { useFocusEffect } from '@react-navigation/native';

export default function Command({ navigation }) {
    const [panier, setPanier] = useState(null);
    const [token, setToken] = useState(null); // État pour stocker le token
    const [newQuantities, setNewQuantities] = useState({}); // État pour stocker les nouvelles quantités des produits

    useEffect(() => {
        const fetchTokenFromSecureStore = async () => {
            try {
                const storedToken = await SecureStore.getItemAsync("token");
                setToken(storedToken);
            } catch (error) {
                console.error("Erreur lors de la récupération du token :", error);
            }
        };

        fetchTokenFromSecureStore();
    }, []);

    useFocusEffect(
        React.useCallback(() => {
            if (token) {
                fetchPanier();
            }
        }, [token])
    );

    const fetchPanier = async () => {
        try {
            const response = await fetch(`https://gourmandise-api.bdessis.v70208.campus-centre.fr/lookPanier?token=${token}`);
            if (response.ok) {
                const data = await response.json();
                // Ajouter le prix total calculé à chaque élément du panier
                const panierAvecPrixTotal = data.map(item => ({
                    ...item,
                    prix_total: parseFloat(item.prix_unitaire_HT) * parseInt(item.quantite, 10)
                }));
                // Initialiser les nouvelles quantités avec les quantités actuelles du panier
                const newQuantitiesData = {};
                panierAvecPrixTotal.forEach(item => {
                    newQuantitiesData[item.codepa] = item.quantite;
                });
                setNewQuantities(newQuantitiesData);
                setPanier(panierAvecPrixTotal);
            } else if (response.status === 404) {
                console.error('Token introuvable');
            } else {
                console.error('Erreur serveur lors de la récupération du panier');
            }
        } catch (error) {
            console.error('Erreur lors de la récupération du panier :', error);
        }
    };

    const handleQuantityChange = (codepa, nouvelleQuantite) => {
        setNewQuantities(prevQuantities => ({
            ...prevQuantities,
            [codepa]: nouvelleQuantite
        }));
    };

    const updateQuantities = async () => {
        try {
            const updateRequests = Object.keys(newQuantities).map(codepa => {
                const nouvelleQuantite = newQuantities[codepa];
                return fetch('https://gourmandise-api.bdessis.v70208.campus-centre.fr/updatePanier', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        codepa: codepa,
                        nouvelleQuantite: nouvelleQuantite
                    })
                });
            });

            const updateResponses = await Promise.all(updateRequests);
            const successResponses = updateResponses.filter(response => response.ok);
            if (successResponses.length === updateResponses.length) {
                // Toutes les mises à jour ont réussi
                Alert.alert('Quantités mises à jour avec succès.');
            } else {
                // Certaines mises à jour ont échoué
                Alert.alert('Certaines mises à jour des quantités ont échoué.');
            }
            // Recharger le panier après les mises à jour
            fetchPanier();
        } catch (error) {
            console.error('Erreur lors de la mise à jour des quantités du panier :', error);
            Alert.alert('Une erreur est survenue lors de la mise à jour des quantités du panier.');
        }
    };

    const handleDeleteItem = async (codepa) => {
        try {
            const response = await fetch('https://gourmandise-api.bdessis.v70208.campus-centre.fr/deletePanier', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    token: token,
                    codepa: codepa
                })
            });
            if (response.ok) {
                // Recharger le panier après suppression
                fetchPanier();
                Alert.alert('Élément du panier supprimé avec succès.');
            } else {
                const responseData = await response.json();
                Alert.alert(responseData.message || 'Erreur lors de la suppression de l\'élément du panier.');
            }
        } catch (error) {
            console.error('Erreur lors de la suppression de l\'élément du panier :', error);
            Alert.alert('Une erreur est survenue lors de la suppression de l\'élément du panier.');
        }
    };

    return (
        <View>
            <Text>Votre panier :</Text>
            {panier ? (
                <View>
                    {panier.map((item, index) => (
                        <View key={index}>
                            <Text>{item.designation}</Text>
                            {/* Prix unitaire */}
                            <Text>{item.prix_unitaire_HT}</Text>
                            {/* Quantité */}
                            <Text> Quantité commandée : {item.quantite}</Text>
                            {/* Prix total */}
                            <Text>Prix total: {item.prix_total.toFixed(2)}€</Text>
                            <TextInput
                                style={{ height: 40, borderColor: 'gray', borderWidth: 1 }}
                                onChangeText={text => handleQuantityChange(item.codepa, text)}
                                value={newQuantities[item.codepa] ? newQuantities[item.codepa].toString() : ''}
                                keyboardType="numeric"
                            />
                            <Button
                                title="Supprimer"
                                onPress={() => handleDeleteItem(item.codepa)}
                            />
                        </View>
                    ))}
                    <Button
                        title="Mettre à jour les quantités"
                        onPress={updateQuantities}
                    />
                </View>
            ) : (
                <Text>Pour visionner votre panier veuillez vous connnecter...</Text>
            )}
        </View>
    );
}
