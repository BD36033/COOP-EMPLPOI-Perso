import React, { useEffect, useState, useContext  } from "react";
import {View, Text, TouchableOpacity, SafeAreaView, Image} from "react-native";
import { FontAwesome } from "@expo/vector-icons";
import { styles, stylesMenu, stylesUtilisateur } from "../styles/AppStyles";
import * as SecureStore from "expo-secure-store";
import {AuthContext} from "../component/AuthContext";
import Icon from 'react-native-vector-icons/FontAwesome'


export default function ProfilUtilisateur({ navigation }) {
    const [utilisateur, setUtilisateur] = useState(null);
    const { signOut } = useContext(AuthContext);

    useEffect(() => {
        const fetchUserProfile = async () => {
            try {
                const token = await SecureStore.getItemAsync("token");
                const response = await fetch(`https://gourmandise-api.bdessis.v70208.campus-centre.fr/lookprofil?token=${token}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });
                if (response.ok) {
                    const userData = await response.json();
                    setUtilisateur(userData[0]); // Supposant que la réponse renvoie un tableau d'utilisateurs et que vous voulez le premier utilisateur
                } else {
                    console.error("Impossible de récupérer les informations de l'utilisateur");
                }
            } catch (error) {
                console.error("Erreur lors de la récupération des informations de l'utilisateur :", error);
            }
        };
        fetchUserProfile();
    }, []);

    // Fonction pour gérer la déconnexion
    const handleLogout = async () => {
        try {
            await SecureStore.deleteItemAsync("token");
            console.log("Utilisateur déconnecté");
            // Mettez à jour l'état de connexion de l'utilisateur
            signOut();
            // Redirigez l'utilisateur vers l'écran de connexion par exemple
            navigation.navigate("Se connecter");
        } catch (error) {
            console.error("Erreur lors de la déconnexion :", error);
        }
    };





    const MenuUtilisateur = () => {
        return (
            <View style={stylesMenu.container}>
                <TouchableOpacity style={[stylesMenu.menuItem, { justifyContent: "flex-end" }]} onPress={handleLogout}>
                    <Image
                        style={stylesMenu.logo}
                        source={require("../assets/gourmanidse-removebg-preview.png")}
                    />
                    <FontAwesome name="sign-out" size={24} color="sienna" style={stylesMenu.menuIcon} />
                    <Text style={stylesMenu.menuText}>Déconnexion</Text>
                </TouchableOpacity>
            </View>
        );
    };

    return (
        <SafeAreaView>
            <View style={stylesUtilisateur.containerPrincipal}>
                <View style={styles.menu}>
                    <MenuUtilisateur />
                </View>
                <View style={stylesUtilisateur.containerUtilisateur}>
                    <Text style={stylesUtilisateur.titreUtilisateur}>Vos informations</Text>
                    {utilisateur && (
                        <>
                            <View style={stylesUtilisateur.infoUtilisateur}>
                                <Icon name="user" size={24} color="sienna" style={stylesUtilisateur.favicon} />
                                <Text style={stylesUtilisateur.labelUtilisateur}>Nom:</Text>
                                <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.nom}</Text>
                            </View>
                            <View style={stylesUtilisateur.infoUtilisateur}>
                                <Icon name="home" size={24} color="sienna" style={stylesUtilisateur.favicon} />
                                <Text style={stylesUtilisateur.labelUtilisateur}>Adresse:</Text>
                                <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.adresse}</Text>
                            </View>
                            <View style={stylesUtilisateur.infoUtilisateur}>
                                <Icon name="phone" size={24} color="sienna" style={stylesUtilisateur.favicon} />
                                <Text style={stylesUtilisateur.labelUtilisateur}>Numéro de téléphone:</Text>
                                <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.telephone}</Text>
                            </View>
                            <View style={stylesUtilisateur.infoUtilisateur}>
                                <Icon name="map-marker" size={24} color="sienna" style={stylesUtilisateur.favicon} />
                                <Text style={stylesUtilisateur.labelUtilisateur}>Ville:</Text>
                                <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.ville} {utilisateur.cp}</Text>
                            </View>
                            <View style={stylesUtilisateur.infoUtilisateur}>
                                <Icon name="truck" size={24} color="sienna" style={stylesUtilisateur.favicon} />
                                <Text style={stylesUtilisateur.labelUtilisateur}>Lieu de livraison:</Text>
                                <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.adrLivraison}</Text>
                            </View>
                        </>
                    )}
                </View>
            </View>
        </SafeAreaView>
    );
}