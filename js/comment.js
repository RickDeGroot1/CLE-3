window.addEventListener('load', function() {
    // Find dropdown menu
    var dropdown = document.getElementById('dropdown');
    dropdown.addEventListener('change', getLiftsAndEscalators);

    var commentForm = document.getElementById('comment-form');
    commentForm.addEventListener('submit', validateForm);
});

function validateForm(event) {
    // Prevent default form submission
    event.preventDefault();

    // Get the selected station ID
    var stationId = document.getElementById('dropdown').value;

    // Check if a station is selected
    if (stationId === '') {
        alert('Selecteer een station');
        return; // Stop form submission if station is not selected
    }

    // Get the selected lift value
    var liftValue = document.querySelector('input[name="lift"]:checked');
    if (!liftValue) {
        alert('Selecteer het aantal liften dat niet werkt');
        return; // Stop form submission if lift is not selected
    }

    // Get the selected escalator value
    var escalatorValue = document.querySelector('input[name="escalator"]:checked');
    if (!escalatorValue) {
        alert('Selecteer het aantal roltrappen dat niet werkt');
        return; // Stop form submission if escalator is not selected
    }

    // If all validations pass, proceed with form submission
    document.getElementById('comment-form').submit();
}

function getLiftsAndEscalators() {
    // The selected value of the dropdown menu
    var stationId = document.getElementById('dropdown').value;

    // Check if a station is selected
    if (stationId !== '') {
        fetch('get_lifts_and_escalators.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'stationId=' + encodeURIComponent(stationId)
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                return response.json();
            })
            .then(data => {
                displayRadios(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}

function displayRadios(data) {
    var liftRadios = document.getElementById('lift_radios');
    liftRadios.innerHTML = '';
    var liftLabel = document.createElement('label');
    liftLabel.textContent = 'Hoeveel liften werken niet?';
    liftRadios.appendChild(liftLabel);
    liftRadios.appendChild(document.createElement('br')); // Voeg een <br> toe

    var zeroLiftRadio = document.createElement('input');
    zeroLiftRadio.type = 'radio';
    zeroLiftRadio.id = 'lift0';
    zeroLiftRadio.name = 'lift';
    zeroLiftRadio.value = 0;
    var zeroLiftLabel = document.createElement('label');
    zeroLiftLabel.htmlFor = 'lift0';
    zeroLiftLabel.innerHTML = '0';
    liftRadios.appendChild(zeroLiftRadio);
    liftRadios.appendChild(zeroLiftLabel);
    liftRadios.appendChild(document.createElement('br'));

    // Maak radiobuttons voor elke lift in de ontvangen data
    for (var i = 1; i <= data.lifts; i++) {
        var radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = 'lift' + i;
        radio.name = 'lift';
        radio.value = i;
        radio.className = 'comment-checkbox'; // Add class for styling
        var label = document.createElement('label');
        //voor gebruiksvriendelijkheid, koppelt label met radiobuttons
        label.htmlFor = 'lift' + i;
        label.innerHTML = i; // nummer is de label
        label.className = 'comment-label'; // voor styling

        liftRadios.appendChild(radio);
        liftRadios.appendChild(label);
        liftRadios.appendChild(document.createElement('br')); // Voeg een <br> toe
    }

    var escalatorRadios = document.getElementById('escalator_radios');
    escalatorRadios.innerHTML = ''; // Clear previous content
    var escalatorLabel = document.createElement('label');
    escalatorLabel.textContent = 'Hoeveel roltrappen werken niet?';
    escalatorRadios.appendChild(escalatorLabel);
    escalatorRadios.appendChild(document.createElement('br')); // Voeg een <br> toe

    var zeroEscalatorRadio = document.createElement('input');
    zeroEscalatorRadio.type = 'radio';
    zeroEscalatorRadio.id = 'escalator0';
    zeroEscalatorRadio.name = 'escalator';
    zeroEscalatorRadio.value = 0;
    var zeroEscalatorLabel = document.createElement('label');
    zeroEscalatorLabel.htmlFor = 'escalator0';
    zeroEscalatorLabel.innerHTML = '0';
    escalatorRadios.appendChild(zeroEscalatorRadio);
    escalatorRadios.appendChild(zeroEscalatorLabel);
    escalatorRadios.appendChild(document.createElement('br'));

    // Maak radiobuttons voor elke roltrap in de ontvangen data
    for (var j = 1; j <= data.escalators; j++) {
        var radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = 'escalator' + j;
        radio.name = 'escalator';
        radio.value = j;
        radio.className = 'comment-checkbox'; // Add class for styling

        var label = document.createElement('label');
        label.htmlFor = 'escalator' + j; //voor gebruiksvriendelijkheid, koppelt label met radiobuttons
        label.innerHTML = j; // Display the number as label
        label.className = 'comment-label'; // Add class for styling

        escalatorRadios.appendChild(radio);
        escalatorRadios.appendChild(label);
        escalatorRadios.appendChild(document.createElement('br'));
    }
}
