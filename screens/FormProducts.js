import React, { useEffect, useState } from "react";
import { View, Text, Image, TouchableOpacity, Modal, TextInput, Alert } from "react-native";
import { styles, stylesFiche, stylesList } from "../styles/AppStyles";
import { SwiperFlatList } from "react-native-swiper-flatlist";
import * as SecureStore from "expo-secure-store";

export default function FormProducts({ route }) {
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

    const handleAddToCart = () => {
        // Appel de la fonction pour ajouter au panier
        addToCart();
    };

    const addToCart = () => {
        if (!token) {
            // Gérer le cas où le token n'est pas disponible
            console.error("Token non disponible");
            return;
        }

        // Vérifier si productDetails existe et contient la propriété prix_unitaire_HT
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
        fetch("/addPanier", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                toggleModal();
            })
            .catch(error => {
                console.error("Erreur lors de l'ajout au panier :", error);
                Alert.alert("Erreur", "Une erreur est survenue lors de l'ajout au panier.");
            });
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
                    <TouchableOpacity style={styles.btn_search} onPress={handleAddToCart}>
                        <Text style={styles.btn_search_text}>Ajouter au panier</Text>
                    </TouchableOpacity>
                </View>
            </View>
            {/* partie du bas de la fiche produits*/}
            {/*<View style={stylesFiche.cardBas}>*/}
            {/*    <Text style={stylesFiche.title}>Produits en promotion</Text>*/}
            {/*    <Text style={stylesFiche.text}>Pour une durée limitée !</Text>*/}
            {/*    <SwiperFlatList>*/}
            {/*        <View style={styles.photoSlide}>*/}
            {/*            <Image*/}
            {/*                source={require("../assets/dispo.jpg")}*/}
            {/*                style={styles.photoSlideImage}*/}
            {/*            />*/}
            {/*        </View>*/}
            {/*    </SwiperFlatList>*/}
            {/*    <TouchableOpacity style={styles.btn_search} onPress={handlePromotion}>*/}
            {/*        <Text style={styles.btn_search_text}>Promotion</Text>*/}
            {/*    </TouchableOpacity>*/}
            {/*</View>*/}
            <Modal
                animationType="slide"
                transparent={true}
                visible={isModalVisible}
                onRequestClose={toggleModal}
            >
                <View style={styles.modalContainer}>
                    <View style={styles.modalContent}>
                        <Text style={styles.texteModal}>Produit ajouté au panier !</Text>
                        <TouchableOpacity onPress={toggleModal}>
                        </TouchableOpacity>
                    </View>
                </View>
            </Modal>
        </View>
    );
}