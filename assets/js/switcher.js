// declare 3 forms that should dynamically changed when type is switched
const dvd = `
    <div id="Dvd" class="row box dvd">
        <div class="dynamic-section col-md-6 col-lg-4 col-xl-4">
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Size (MB)</span>
                </div>
                <input id="size" name="size" type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                <p class="lead" style="text-align: left;margin-top: 1rem">
                    <span style="color: red;">*</span> Please provide DVD size in MB Format
                </p>
            </div>
        </div>
    </div>
`;
const furniture = `
    <div id="Furniture" class="row box furniture">
        <div class="dynamic-section col-md-6 col-lg-4 col-xl-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Height (CM)</span>
                </div>
                <input id="height" name="height" type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Width (CM)</span>
                </div>
                <input id="width" name="width" type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Length (CM)</span>
                </div>
                <input id="length" name="length" type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <p class="lead" style="text-align: left;margin-top: 1rem">
                <span style="color: red;">*</span> Please provide Furniture dimensions in HxWxL format.
            </p>
        </div>
    </div>
`;
const book = `
    <div id="Book" class="row box book">
        <div class="dynamic-section col-md-6 col-lg-4 col-xl-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Weight (KG)</span>
                </div>
                <input id="weight" name="weight" type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <p class="lead" style="text-align: left;margin-top: 1rem">
                <span style="color: red;">*</span> Please provide Book Weight in KG format.
            </p>
        </div>
    </div>
`;
const selectElement = document.querySelector('#productType');

selectElement.addEventListener('change', (event) => {
    if (event.target.value == 'Dvd') {
        document.getElementById("typeForm").innerHTML = dvd;
    } else if (event.target.value == 'Book') {
        document.getElementById("typeForm").innerHTML = book;
    } else {
        document.getElementById("typeForm").innerHTML = furniture;
    }
});