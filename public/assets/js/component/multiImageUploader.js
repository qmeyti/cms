function imageUploader(fieldName) {

    fieldNameUpperCase = fieldName.toUpperCase();
    /**
     * Open file manager
     */

    /**
     * Open file manager
     */
    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');


    /**
     * Set image link to inputs
     *
     * @param IMAGE_URL
     */
    window.fmSetLink = function (IMAGE_URL) {

        const inputTag = document.querySelector(`#${fieldNameUpperCase}_INPUT`);

        inputTag.setAttribute('value', IMAGE_URL);

        const imageTag = document.querySelector(`#${fieldNameUpperCase}_PREVIEW img`);

        imageTag.setAttribute('src', IMAGE_URL);
    }

}

function imageRemover(fieldName) {

    fieldNameUpperCase = fieldName.toUpperCase();

    const inputTag = document.querySelector(`#${fieldNameUpperCase}_INPUT`);

    inputTag.setAttribute('value', '');

    const imageTag = document.querySelector(`#${fieldNameUpperCase}_PREVIEW img`);

    imageTag.setAttribute('src', '');
}
