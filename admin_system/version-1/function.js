function displayError(inputId, errorMessage) {
    const inputField = document.getElementById(inputId);
    const existingError = inputField.nextElementSibling;

    // Check if an error already exists and remove it if present
    if (existingError && existingError.classList.contains('invalid-feedback')) {
        existingError.remove();
    }

    // If the error message is not empty, display the error
    if (errorMessage) {
        const errorElement = document.createElement('div');
        errorElement.className = 'invalid-feedback';
        errorElement.textContent = errorMessage;
        inputField.parentNode.insertBefore(errorElement, inputField.nextSibling);
        inputField.classList.add('is-invalid');
    } else {
        // Remove the 'is-invalid' class if no error message
        inputField.classList.remove('is-invalid');
    }
}

    async function getOil(oil_code) {
        try {
            const response = await fetch(`../../../API's/oil_api's/get_oil_by_id.php?oil_id=${oil_code}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error('Failed to fetch oil data');
            }

            const data = await response.json();
            
            if (data.status) {
                console.log('Oil data function retrieved successfully:', data);
                return data;
            } else {
                console.error('Error:', data.message);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
function renderEditOilData(data) {
    let oilData = data.data;
    
    var html = 
        `<div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="card-header">Edit details</h5>
                        <button id="edit_oil" class="btn rounded-pill btn-primary m-2 h-75">Save</button>
                    </div>
                    <div class="card-body d-flex flex-wrap">
                        <div class="col m-1">
                            <label for="Oil name" class="form-label">Oil name</label>
                            <input type="text" class="form-control" id="oil_name" value="${oilData.oil_name}"/>
                        </div>
                        <div class="col m-1">
                            <label for="Oil cost" class="form-label">Oil cost in ml</label>
                            <input type="number" min="0.01" class="form-control" id="oil_cost" value="${oilData.cost_per_ml}"/>
                        </div>
                        <div class="col m-1">
                            <label for="Oil quantity" class="form-label">Oil quantity</label>
                            <input type="text" class="form-control" id="oil_quantity" value="${oilData.quantity_in_ml}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
    
    document.getElementById('edit-oil').innerHTML = html;

    document.getElementById("edit_oil").addEventListener("click", async function() {
        var oil_name = document.getElementById("oil_name").value;
        var oil_cost = document.getElementById("oil_cost").value;
        var oil_quantity = document.getElementById("oil_quantity").value;

        var oil_data = {
            oil_id:oilData.oil_id,
            oil_name: oil_name,
            cost_per_ml: oil_cost,
            quantity_in_ml: oil_quantity
        };
        await updateOilData(oil_data);
    });
}

async function updateOilData(oil_data) {
    try {
        const response = await fetch(`../../../API's/oil_api's/update_oil.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(oil_data)
        });

        const result = await response.json();

        if (result.status) {
            alert('Oil data updated successfully');
            location.reload();
        } else {
            console.error('Failed to update oil data:', result.message);
            alert('Failed to update oil data: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while updating oil data');
    }
}

function formatDate(date) {
    const now = new Date();
    const diffInSeconds = Math.floor((now - date) / 1000);
    const diffInMinutes = Math.floor(diffInSeconds / 60);
    const diffInHours = Math.floor(diffInMinutes / 60);
    const diffInDays = Math.floor(diffInHours / 24);

    if (diffInSeconds < 60) {
        return 'Just now';
    } else if (diffInMinutes < 60) {
        return `${diffInMinutes} minutes ago`;
    } else if (diffInHours < 24) {
        return `${diffInHours} hours ago`;
    } else if (diffInDays < 7) {
        return `${diffInDays} days ago`;
    } else {
        return date.toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' });
    }
}
    // Function to setup dropdowns
function setupDropdown(dropdownToggleSelector, dropdownMenuSelector, defaultText) {
    const dropdownToggle = document.querySelector(dropdownToggleSelector);
    const dropdownMenu = document.querySelector(dropdownMenuSelector);

    if (!dropdownToggle || !dropdownMenu) return; // Exit if elements are not found

    dropdownToggle.dataset.defaultText = defaultText; // Set default text
    dropdownToggle.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent closing when clicking the toggle itself
        dropdownMenu.classList.toggle('show'); // Use class to toggle visibility
    });

    document.addEventListener('click', function(event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show'); // Hide dropdown when clicking outside
        }
    });

    // Use 'click' instead of 'change' if you are not using form inputs
    dropdownMenu.addEventListener('click', function(event) {
        // Ensure only clicks on inputs are processed
        if (event.target.tagName === 'INPUT' && event.target.type === 'checkbox') {
            const selectedOptions = Array.from(dropdownMenu.querySelectorAll('input:checked'))
                .map(checkbox => checkbox.value);
            dropdownToggle.textContent = selectedOptions.length > 0 ? selectedOptions.join(', ') : defaultText;
        }
    });
}
        // Check if the media is an image or video
        function checkMediaType(path) {
            const extension = path.split('.').pop().toLowerCase();
            const imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            const videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm'];

            if (imageExtensions.includes(extension)) {
                return 'image';
            } else if (videoExtensions.includes(extension)) {
                return 'video';
            } else {
                return 'unknown';
            }
        }



    /*to handel image paste !*/
    function handleImagePaste(pasteEvent, imageDisplayId, imageDisplayRowId, inputFieldId, callback) {
    // Check for paste event
    const clipboardItems = pasteEvent.clipboardData.items;
    let imageFile = null;

    // Check if the clipboard contains image data
    for (let i = 0; i < clipboardItems.length; i++) {
        if (clipboardItems[i].type.indexOf("image") !== -1) {
            imageFile = clipboardItems[i].getAsFile();
            break;
        }
    }

    // If image is found, handle it
    if (imageFile) {
        const reader = new FileReader();

        // When the file is loaded, perform operations
        reader.onload = function (e) {
            const imageDisplay = document.getElementById(imageDisplayId); // Target the img tag
            const imageDisplayRow = document.getElementById(imageDisplayRowId); // Parent container
            const inputElement = document.getElementById(inputFieldId);

            // Display the image inside the img tag
            if (imageDisplay) {
                imageDisplay.src = e.target.result;
            }

            // Show the parent row if it's hidden
            if (imageDisplayRow) {
                imageDisplayRow.classList.remove("hidden");
            }

            // Simulate file input change
            if (inputElement) {
                const event = new Event('change', { bubbles: true, cancelable: true });
                inputElement.files = new FileListItems([imageFile]);
                inputElement.dispatchEvent(event);
            }

            // Optional callback for additional handling
            if (callback) {
                callback(imageFile, e.target.result);
            }
        };

        reader.readAsDataURL(imageFile); // Read the file as a data URL
    } else {
        alert("No image found in clipboard!");
    }
}

// Custom FileList constructor to simulate the file list from a pasted file
// class FileListItems {
//     constructor(files) {
//         this.files = files;
//     }

//     item(index) {
//         return this.files[index] || null;
//     }

//     get length() {
//         return this.files.length;
//     }
// }
/*this is how you can call the function

document.addEventListener('paste', function (event) {
    handleImagePaste(
        event,                 // The paste event
        "image_display",       // The ID of the <img> element
        "image_display_row",   // The ID of the container (row)
        "product_image",       // The ID of the input field
        (file, dataUrl) => {   // Optional callback
            console.log("Image file:", file);
            console.log("Data URL:", dataUrl);
        }
    );
});


*/



