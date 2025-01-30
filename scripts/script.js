const editForms = document.querySelectorAll(".edit");
const buttonClosePopup = document.querySelector("button#closePopup");
const divEditPopup = document.querySelector("div#editPopup");
const editPopupOverlay = document.querySelector("#editPopupOverlay");

const readEditButton = document.querySelector("button#readEdit");
const addButton = document.querySelector("button#add");
const readEditDiv = document.querySelector("div#readEdit");
const addDiv = document.querySelector("div#add");

editForms.forEach(function (form) {
    form.addEventListener('submit', function(e) {
        //Prevent form from reloading the page on submit
        e.preventDefault();

        //Get the value of the submitter (submit button) to evaluate which action should be carried out
        const submitter = e.submitter;
        //Create a Form class instance to get the data from the form
        const formData = new FormData(form);

        //Perform appropriate action based on the submitter value
        if (submitter.value === "delete"){
            //Handle deletion logic
        } else if (submitter.value === "edit"){
            //Extract the id value from the hidden input in form
            const id = formData.get("id"); 

            //Create new AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./scripts/form_handlers/EditFormHandler.php", true) //EditFormHandler will return the query in JSON format
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            //Handle the AJAX response 
            xhr.onload = function(){
                if (xhr.status === 200){
                    try {
                        const data = JSON.parse(xhr.responseText)[0];

                        divEditPopup.innerHTML = `
                            <h3>Edycja zawodnika</h3>
                            <p>ID: ${data.id}</p>
                            <form method='POST' class='update'>
                            <label for="imie">Imię</label><br />
                            <input type="text" id="imie" name="imie" value="${data.imie}"><br />
                            <label for="nazwisko">Nazwisko</label><br />
                            <input type="text" id="nazwisko" name="nazwisko" value="${data.nazwisko}"><br />
                            <label for="klasa">Klasa</label><br />
                            <input type="number" id="klasa" name="klasa" value="${data.klasa}"><br />
                            <label for="rok_urodzenia">Rok urodzenia</label><br />
                            <input type="number" id="rok_urodzenia" name="rok_urodzenia" value="${data.rokurodzenia}"><br />
                            <label for="wzrost">Wzrost</label><br />
                            <input type="number" id="wzrost" name="wzrost" value="${data.wzrost}"><br />
                            <button type='submit' name='update' value='Zapisz'>Zapisz</button>
                            </form>
                            <br /><button id="closePopup">Anuluj</button>
                        `;

                        const buttonClosePopup = document.querySelector("button#closePopup");
                        buttonClosePopup.addEventListener('click', function(e) {
                            e.preventDefault();
                            divEditPopup.style.display = 'none';
                            editPopupOverlay.style.display = 'none';
                        })

                        divEditPopup.style.display = 'inline-block';
                        editPopupOverlay.style.display = 'block';
                    } catch (error) {
                        console.error("Error parsing JSON response:", error);
                    }
                } else {
                    console.error("Error with request:", xhr.status, xhr.statusText);
                }
            };
            //Encode id argument in the POST request to the "EditFormHandler.php" script to be further used as a query parameter
            xhr.send(`id=${encodeURIComponent(id)}`);
        }
    });
});

//Event listeners for the main content buttons - switch between read/edit and add divs
readEditButton.addEventListener('click', function(){
    readEditDiv.style.display = 'block';
    addDiv.style.display = 'none';
});
addButton.addEventListener('click', function(){
    readEditDiv.style.display = 'none';
    addDiv.style.display = 'block';
});