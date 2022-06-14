$(document).ready(function() {
    if (location.search) {
        var page = Number(location.search.split("=")[1]); //lấy page
        console.log(page);
        var listPageNumber = $(".page-item"); //dãy nút phân trang
        for (var i = 0; i < listPageNumber.length; i++) {
            if (i === page) {
                listPageNumber[i].className = "list-group-item page-item active";
                console.log(listPageNumber[i]);
            } else {
                listPageNumber[i].className = "list-group-item page-item";
            }
        }
    }
});
$(document).ready(function() {
    var inputElement = document.querySelector("#input-control");
    console.log(inputElement);
    inputElement.oninput = function(e) {
        console.log(e.target.value);
        search(e.target.value);
    };
});

function search(keyword) {
    $.post("searchsinhvien.php", { nd: keyword }).done(function(data) {
        let htmlData = createSearchList(data);
        if (keyword) {
            $("#result").css("display", "none");
            $("#list-gr").css("display", "none");
            $("#search-result").css("display", "table");
            $("#main-data").html(htmlData);
        } else {
            $("#result").css("display", "table");
            $("#list-gr").css("display", "flex");
            $("#search-result").css("display", "none");
        }
    });
}

function createSearchList(data) {
    let rows = [];
    console.log(data.length);
    for (var i = 0; i < data.length; i++) {
        let row = `<tr>
      <td>${data[i]["masv"]}</td>
      <td>${data[i]["hodemsv"]}</td>
      <td>${data[i]["tensv"]}</td>
      <td> <img style="width: 100px;height: 100px;" src="IMG/${data[i]["hinhanh"]}"/></td>
      <td>${data[i]["ngaysinh"]}</td>
      <td>${data[i]["gioitinh"]}</td>
      <td>${data[i]["dantoc"]}</td>
      <td>${data[i]["cmnd"]}</td>
      <td>${data[i]["tongiao"]}</td>
      <td>${data[i]["maquequan"]}</td>
      <td>${data[i]["sdt"]}</td>
      <td>${data[i]["email"]}</td>
      <td>${data[i]["machucvu"]}</td>
      <td>${data[i]["malop"]}</td>
      <td>${data[i]["matinhtranghoc"]}</td>
      <td><button class="button-24" onclick=\'window.open("inputsinhvien.php?id=' . $cla['masv'] . '","_self")\'><i class="bi bi-pencil-square"></i></button></td>
      <td><button class="button-24" onclick="deleteqs(\'' . $cla['masv'] . '\')"><i class="bi bi-person-x-fill"></i></button></td>
      </tr>`;
        if (data[i]["masv"]) {
            rows.push(row);
        }
    }

    console.log(rows.length);

    return rows;
}