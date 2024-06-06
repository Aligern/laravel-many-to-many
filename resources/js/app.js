import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const image = document.getElementById("uploadImage");

if (image) {
    image.addEventListener("change", () => {

        const preview = document.getElementById("uploadPreview");

        const reader = new FileReader();
        reader.readAsDataURL(image.files[0]);


        reader.onload = function (event) {

            preview.src = event.target.result;
        };
    });
}