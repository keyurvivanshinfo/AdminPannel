function con() {
  let c = confirm("Are you Sure");
  if (c) {
    return true;
  } else {
    return false;
  }
}

$(document).ready(function () {
  $("#search").on("keyup", function () {
    var a = $(this).val().toLowerCase();
    $("#users tr").filter(function () {
      $(this).toggle($(this).text().toLocaleLowerCase().indexOf(a) > -1);
    });
  });
});

$(document).on("click", "th", function () {
  console.log($(this).index());

  var ind = $(this).index();

  var table = $(this).parents("table");

  var rows = table
    .find("tr:gt(0)")
    .toArray()
    .sort(function (a, b) {
      return TableCompare(a, b, ind);
    });

  this.asc = !this.asc;

  if (!this.asc) {
    rows = rows.reverse();
  }

  table.children("tbody").empty().html(rows);
});

function TableCompare(a, b, index) {
  var a_val = tableCellValue(a, index);
  var b_val = tableCellValue(b, index);

  var result =
    $.isNumeric(a_val) && $.isNumeric(b_val)
      ? a_val - b_val
      : a_val.toString().localeCompare(b_val.toString());
  return result;
}

function tableCellValue(row, index) {
  return $(row).children("td").eq(index).text();
}

$("#click-me").on("click", function () {
  console.log("clicked")
  var num = $("#number").val();

  $.ajax({
    url: "allUsersapi.php?number=5",
    method: "GET",
    data: "",
    dataType: "json",
    success: function (data) {
      console.log(data);

      someOtherFunc(data);
    },

    error(jqHXR, testStatus, errorThrown) {
      console.log(testStatus);
      alert("Error!".errorThrown);
    },
  });
});

function someOtherFunc(data) {
  // console.log("ok");

  data.forEach((element) => {
    // console.log(element);

    var a = $("<tr></tr>");
    var firstName = $("<td></td>").text(element[3]);
    var lastName = $("<td></td>").text(element[4]);
    var username = $("<td></td>").text(element[1]);
    var email = $("<td></td>").text(element[5]);
    var birthDate = $("<td></td>").text(element[6]);
    var phoneNo = $("<td></td>").text(element[7]);
    var address = $("<td></td>").text(element[8]);
    var gender = $("<td></td>").text(element[9]);
    var userEdit =
      "<td><a href='../views/editUserByAdmin.php?userId=" +
      element[0] +
      "'>Edit</a></td>";
    var userDelete =
      "<td><a href='../php_scripts/deleteUserByAdmin.php?userId=" +
      element[0] +
      "' onclick='return con()'>Delete</a></td>";

    a.append(
      firstName,
      lastName,
      username,
      email,
      birthDate,
      phoneNo,
      address,
      gender,
      userEdit,
      userDelete
    );

    $("#usersTable tbody").append(a);
  });
}
