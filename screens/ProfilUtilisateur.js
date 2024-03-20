import React from "react";
import {View, Text, TouchableOpacity, SafeAreaView} from "react-native";
import { FontAwesome } from "@expo/vector-icons";
import { styles, stylesMenu, stylesUtilisateur } from "../styles/AppStyles";

export default function ProfilUtilisateur({ navigation }) {
    const utilisateur = {
        nom: "John Doe",
        adresse: "123 Rue des Fleurs",
        numeroTelephone: "0123456789",
    };

    const MenuUtilisateur = () => {
        return (
            <View style={stylesMenu.container}>
                <TouchableOpacity style={[stylesMenu.menuItem, { justifyContent: "flex-end" }]} onPress={() => console.log("Déconnexion")}>
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
                <Text style={stylesUtilisateur.titreUtilisateur}>Profil Utilisateur</Text>
                <View style={stylesUtilisateur.infoUtilisateur}>
                    <Text style={stylesUtilisateur.labelUtilisateur}>Nom:</Text>
                    <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.nom}</Text>
                </View>
                <View style={stylesUtilisateur.infoUtilisateur}>
                    <Text style={stylesUtilisateur.labelUtilisateur}>Adresse:</Text>
                    <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.adresse}</Text>
                </View>
                <View style={stylesUtilisateur.infoUtilisateur}>
                    <Text style={stylesUtilisateur.labelUtilisateur}>Numéro de téléphone:</Text>
                    <Text style={stylesUtilisateur.texteUtilisateur}>{utilisateur.numeroTelephone}</Text>
                </View>
            </View>
        </View>
        </SafeAreaView>
    );
}

