import React, {useEffect, useState} from "react";
import {View, Text, Image, TouchableOpacity, Modal, TextInput, Alert, Pressable} from "react-native";
import {styles, stylesFiche, stylesList} from "../styles/AppStyles";
import {SwiperFlatList} from "react-native-swiper-flatlist";
import * as SecureStore from "expo-secure-store";

export default function FormProducts({route}) {
    const productDetails = route.params?.productDetails;
    const [isModalVisible, setModalVisible] = useState(false);
    const [quantity, setQuantity] = useState(1);
    const [token, setToken] = useState(null); // Ajoutez l'état pour stocker le token

    useEffect(() => {
        // Fonction pour récupérer le token de l'utilisateur
        const fetchUserProfile = async () => {
            try {
                const token = await SecureStore.getItemAsync("token");
                setToken(token);
            } catch (error) {
                console.error("Erreur lors de la récupération du token :", error);
            }
        };

        fetchUserProfile();
    }, []);

    const handleAddToCart = async () => {
        // Appel de la fonction pour ajouter au panier
        await addToCart();
    };

    const addToCart = async () => {
        if (!token) {
            // Gérer le cas où le token n'est pas disponible
            console.error("Token non disponible");
            return;
        }


        // if (!productDetails || !productDetails.prix_unitaire_HT) {
        //     console.error("Détails du produit non disponibles ou prix_unitaire_HT manquant");
        //     return;
        // }


        const total_price = productDetails.prix_unitaire_HT * quantity;
        const data = {
            token: token,
            total_prix: total_price,
            reference: productDetails.reference,
            quantite: quantity
        };
        // Exécution de la requête
        try {


            const response = await fetch("https://gourmandise-api.bdessis.v70208.campus-centre.fr/addPanier", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
            if (response.ok) {
              alert('Ajout effectué')
            } else {
                if (response.status === 401) {
                    // Gérer les cas d'erreur
                    alert('Client non Trouvé')
                }
                // Si le serveur renvoie une erreur 500, afficher la modal d'erreur
                if (response.status === 500) {
                    alert('erreur serveur')
                }
            }
        } catch (error) {
            console.error("Erreur lors de l'ajout au panier :", error);
            alert("Une erreur est survenue lors de l'ajout au panier.");
        }
    };

    const handlePromotion = () => {

    };

    const toggleModal = () => {
        setModalVisible(!isModalVisible);
    };

    return (
        <View style={stylesFiche.container}>
            <View style={stylesFiche.cardHaut}>
                <Text style={stylesFiche.title}>{productDetails.designation}</Text>
                <Image
                    style={stylesList.imageProduits}
                    source={{
                        uri:
                            productDetails.photo ||
                            "https://cdn.pixabay.com/photo/2022/01/15/19/29/chocolate-6940529_1280.jpg",
                    }}
                />

                <Text style={stylesFiche.text}>
                    Quantite disponible: {productDetails.quantite} produit(s)
                </Text>
                <Text style={stylesFiche.text}>
                    Prix: {productDetails.prix_unitaire_HT} produit(s)
                </Text>
                <Text style={stylesFiche.text}>{productDetails.descriptif}</Text>
                <View>
                    <TextInput
                        style={styles.input}
                        onChangeText={text => setQuantity(text)}
                        value={quantity.toString()}
                        keyboardType="numeric"
                    />
                    {token ? (
                        <TouchableOpacity style={styles.btn_search} onPress={handleAddToCart}>
                            <Text style={styles.btn_search_text}>Ajouter au panier</Text>
                        </TouchableOpacity>) : (
                        <Pressable>
                            <Text style={styles.btn_search_text}>Se connecter</Text>
                        </Pressable>
                    )}
                </View>
            </View>
        </View>
    );
}