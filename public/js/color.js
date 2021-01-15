"use strict"

class Color {

    current_color = 1

    colors = {
        1 : {
            "name" : "Blanc",
            "primary" : "#F2F3F5",
            "secondary" : "white",
            "primary_color" : "#323639",
            "secondary_color" : "#202124"
        },
        2 : {
            "name" : "Vert",
            "primary" : "rgb(120,187,123)",
            "secondary" : "rgb(196,225,197)",
            "primary_color" : "#3F675F",
            "secondary_color" : "#62999C"
        },
        3 : {
            "name" : "Jaune",
            "primary" : "rgb(255,222,93)",
            "secondary" : "rgb(255,255,255)",
            "primary_color" : "#0D3141",
            "secondary_color" : "#1C8C7C"
        },
        4 : {
            "name" : "Marron clair",
            "primary" : "rgb(227,171,154)",
            "secondary" : "rgb(245,225,218)",
            "primary_color" : "#1E130B",
            "secondary_color" : "#38231C"
        },
        5 : {
            "name" : "Gris foncé",
            "primary" : "rgb(68,87,96)",
            "secondary" : "rgb(43,55,61)",
            "primary_color" : "white",
            "secondary_color" : "white"
        },
        6 : {
            "name" : "Gris clair",
            "primary" : "rgb(167,171,183)",
            "secondary" : "rgb(217,218,223)",
            "primary_color" : "black",
            "secondary_color" : "white"
        },
        7: {
            "name" : "Bleu foncé",
            "primary" : "rgb(2,57,62)",
            "secondary" : "rgb(4,91,98)",
            "primary_color" : "white",
            "secondary_color" : "white"
        },

    }


    getAllColor () {
        return this.colors
    }

    getCurrentColor() {
        return this.current_color
    }

    setCurrentColor(id) {
        let color = this.colors[id]
        document.documentElement.style.setProperty('--primary-background-color', color['primary']);
        document.documentElement.style.setProperty('--secondary-background-color', color['secondary']);
        document.documentElement.style.setProperty('--primary-color', color['primary_color']);
        document.documentElement.style.setProperty('--secondary-color', color['secondary_color']);
        this.current_color = id
    }

}