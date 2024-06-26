import React, {useContext, useState} from "react";
import {
    Text,
    TextInput,
    View,
    Image,
    ScrollView,
    TouchableOpacity,
    FlatList,
    Dimensions, SafeAreaView,
} from "react-native";
import {styles, stylesAccueil, stylesFiche, stylesList} from "../styles/AppStyles";
import {createNativeStackNavigator} from "@react-navigation/native-stack";
import resource from "../resources/resource.json";
import {Entypo} from "@expo/vector-icons";
import {AuthContext} from "../component/AuthContext";

const Stack = createNativeStackNavigator();

export default function Home({navigation, route}) {
    const productDetails = route.params?.productDetails;
    const [searchQuery, setSearchQuery] = useState("");
    const {signIn, isLoggedIn} = useContext(AuthContext);
    const [filteredProducts, setFilteredProducts] = useState([]);

    // Fonction de recherche
    const handleSearch = () => {
        console.log("Recherche effectuée avec la requête :", searchQuery);
        // Filtrer les produits en fonction de la désignation
        const filtered = DATA.filter((product) =>
            product.designation && product.designation.toLowerCase().includes(searchQuery.toLowerCase())
        );
        setFilteredProducts(filtered);
    };

    const handleCommandePress = () => {
        navigation.navigate("Commande");
    };
    const nous = resource.nous[0];
    const DATA = [
        {
            id: 1,
            name: "Barre de chocolat au lait",
            description: "Une délicieuse barre de chocolat au lait.",
            photo:
            // "https://cdn.pixabay.com/photo/2013/09/18/18/24/chocolate-183543_1280.jpg",
                "https://image.noelshack.com/fichiers/2024/10/3/1709734609-hub-actu-800x480chocolat-noel-ferrero-collection-2023-s46-1.jpg",
            fallbackPhoto: "https://picsum.photos/200/300",
        },
        {
            id: 2,
            name: "Truffes au chocolat noir",
            description: "Des truffes fondantes au chocolat noir de haute qualité.",
            photo:
            // "https://cdn.pixabay.com/photo/2022/01/15/19/29/chocolate-6940529_1280.jpg",
                "https://image.noelshack.com/fichiers/2024/10/3/1709735007-remise-sur-toutes-les-commandes-sur-le-site-de-revillon-chocolatier.jpg"
        },
        {
            id: 3,
            name: "Chocolat chaud suisse",
            description: "Le chocolat chaud suisse authentique, épais et délicieux.",
            photo:
                "https://cdn.pixabay.com/photo/2016/11/29/13/54/breakfast-1870009_1280.jpg",
        },
        {
            id: 4,
            name: "Crêpes au Nutella",
            description: "De délicieuses crêpes garnies de Nutella au chocolat.",
            photo:
                "https://cdn.pixabay.com/photo/2021/12/08/19/41/dessert-6856584_1280.jpg",
        },
        {
            id: 5,
            name: "Promo chocolat",
            description: "De délicieuses promo.",
            photo:
                "https://ibb.co/0ms9kWc",
        },
    ];
    const PRODUITSPHARE = [
        {
            id: 1,
            photo:
                "https://image.noelshack.com/fichiers/2024/10/3/1709750746-16075381-signe-d-or-best-seller-avec-laurel-illustrationle-vectoriel.jpg",
            fallbackPhoto: "https://picsum.photos/200/300",
        }, {
            id: 2,
            photo:
                "https://image.noelshack.com/fichiers/2024/10/3/1709751618-brown-and-beige-vintage-chocolate-day-facebook-post.png",
            fallbackPhoto: "https://picsum.photos/200/300",
        },
    ];
    const SALARIES = [
        {
            id: 1,
            photo:
                "https://image.noelshack.com/fichiers/2024/10/3/1709756107-15-03-content-squad-embauche-d-un-salarie-etranger-europeen-1.jpg",
            nom:"Amanda Weller"
        },
        {
            id: 2,
            photo:
                "https://image.noelshack.com/fichiers/2024/10/3/1709756107-23c562ab545412997ccea33ec1d7a15d.jpg",
            nom:"Harvey Specter"
        },
        {
            id: 3,
            photo:
                "https://image.noelshack.com/fichiers/2024/10/3/1709756107-2b5a673aa770b9366d8c1bc1305aa81c.jpg",
            nom:"Bruce  Wayne"
        },
    ];

    const handleProductPress = () => {
        navigation.navigate("Nos produits");
    };
    const windowWidth = Dimensions.get("window").width;
    const renderImageItem = ({item}) => (
        <View style={{borderRadius: 10, overflow: "hidden", marginHorizontal: 5}}>
            <Image
                source={item.photo}
                style={{width: windowWidth / 3, height: windowWidth / 3}}
            />
        </View>
    );
    console.log("acceuil console log:" + isLoggedIn);
    return (
        <SafeAreaView style={{ flex: 1 }}>
        <View>
            {/* Barre de recherche avec image Gourmandise */}
            <View style={styles.topBar}>
                <Image
                    style={styles.logoGourmandiseTopBar}
                    source={require("../assets/gourmanidse-removebg-preview.png")}
                />
                <View style={styles.positionRechercheTopBar}>
                    <TouchableOpacity style={styles.btn_search} onPress={handleCommandePress}>
                        {/* Remplacez l'icône de la loupe par l'icône du panier */}
                        <Entypo name="shopping-cart" size={24} color="sienna" />
                    </TouchableOpacity>

                </View>
            </View>

            {/*Zone des flatlist*/}
            <ScrollView>
                <View style={styles.textEspace3}></View>
                <FlatList
                    horizontal
                    data={DATA.slice(0, 2)} // Sélectionnez les deux premières images pour le slider
                    renderItem={({item}) => (
                        <View style={{width: Dimensions.get('window').width}}>
                            <Image source={{uri: item.photo || item.fallbackPhoto}}
                                   style={{width: '100%', height: 200}}/>
                        </View>
                    )}
                    keyExtractor={(item) => item.id.toString()}
                />
                <View style={stylesAccueil.card}>
                    <Text style={stylesAccueil.title}>Message de l'équipe Gourmandise</Text>
                    <FlatList
                        horizontal
                        data={PRODUITSPHARE.slice(0, 2)} // Sélectionnez les deux premières images pour le slider
                        renderItem={({item}) => (
                            <View style={{width: Dimensions.get('window').width}}>
                                <Image source={{uri: item.photo || item.fallbackPhoto}}
                                       style={{width: '100%', height: 200}}/>
                            </View>
                        )}
                        keyExtractor={(item) => item.id.toString()}
                    />
                </View>


                {/*<View style={stylesAccueil.card}>*/}
                {/*    <Text style={styles.title}>Titre ...</Text>*/}
                {/*    <Text style={styles.description}>contenu...</Text>*/}
                {/*</View>*/}


                <View style={stylesAccueil.card}>
                    <View style={styles.textEspace3}></View>
                    <Text style={stylesAccueil.title}>{nous.titre}</Text>
                    <View style={styles.textEspace}></View>
                    <Text style={stylesAccueil.presentationGourmandise}>{nous.notreHistoire}</Text>

                    <View style={styles.textEspace3}></View>

                    <Text style={stylesAccueil.title}>Notre équipe</Text>
                    <View style={stylesAccueil.employeeContainer}>
                        {SALARIES.slice(0, 3).map((employee) => (
                            <View key={employee.id} style={stylesAccueil.employeeCard}>
                                <Image
                                    source={{ uri: employee.photo }}
                                    style={stylesAccueil.employeePhoto}
                                />
                                <Text style={stylesAccueil.employeeName}>{employee.nom}</Text>
                            </View>
                        ))}
                    </View>
                    <View style={{ height: 50 }} />
                </View>
            </ScrollView>

        </View>
        </SafeAreaView>

    );
}
