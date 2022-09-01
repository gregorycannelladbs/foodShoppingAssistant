function deleteRow(r) {
  var index = r.parentNode.parentNode.rowIndex;
  document.querySelector('#shoppingListTable').deleteRow(index);

  var table = document.querySelector('#shoppingListTable');
  var trolley = document.querySelector('#trolley');
  var shoppingList = document.querySelector('.shoppingList');

  if (table.rows.length == 1) {
    trolley.style.display = "none";
    shoppingList.style.display = "none";
    document.querySelector('#checkMark').style.display = "block";
  }
}