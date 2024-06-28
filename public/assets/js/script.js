
function addRow(){
    var tr = `<tr>
    <td>
      <input name="kode[]" type="text" class="form-control" id="exampleInputPassword1">
    </td>
    <td>
      <input name="ukuran[]" type="text" class="form-control" id="exampleInputPassword1">
    </td>
    <td>
      <input name="jumlah[]" type="number" class="form-control" id="exampleInputPassword1">
    </td>
    <td>
      <input name="harga[]" type="number" class="form-control" id="exampleInputPassword1">
    </td>
    <td>
      <span href="#" class="btn btn-danger form-control delete-row" onclick="(function(){
        document.querySelectorAll('.delete-row').forEach(function(button) {
            button.addEventListener('click', function() {
              this.parentNode.parentNode.remove();
            });
        });
      }())">Hapus</span>
    </td>
    </tr>`
    document.getElementById('mytable').getElementsByTagName('tbody')[0].insertAdjacentHTML('beforeend', tr);
}
