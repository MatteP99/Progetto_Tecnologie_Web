$(document).ready(function () {
    $.getJSON("dummy_page.php", function(data) {
        let formattedData = formatData(data);
        $("main").append(formattedData);    
    });
});

function formatData(data) {
    let formattedData = '';
    for(let i = 0; i < data.length; i++) {
        let dataItem = '';
        formattedData.append(dataItem);
    }
    return formattedData;
}
