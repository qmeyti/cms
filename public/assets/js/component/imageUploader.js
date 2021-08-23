let fieldNameUpperCase = null;

function imageUploader(fieldName) {

    fieldNameUpperCase = fieldName.toUpperCase();
    /**
     * Open file manager
     */

    document.getElementById(`${fieldNameUpperCase}_BTN`).addEventListener('click', (event) => {

        event.preventDefault();

        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    /**
     * Delete the feature photo
     */
    $(`#${fieldNameUpperCase}_TRASH`).click(function () {
        fmSetLink('');
    });

}

/**
 * Set image link to inputs
 *
 * @param IMAGE_URL
 */
function fmSetLink(IMAGE_URL) {

    const inputTag = document.querySelector(`#${fieldNameUpperCase}_INPUT`);

    inputTag.setAttribute('value', IMAGE_URL);

    const imageTag = document.querySelector(`#${fieldNameUpperCase}_PREVIEW img`);

    imageTag.setAttribute('src', IMAGE_URL);
}
