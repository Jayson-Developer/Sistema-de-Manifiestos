<!DOCTYPE html>
<html>
<head>
	<title>Formulario de manifiesto</title>
</head>
<body>
	<form action="Insertar_Ordenes.php" method="post">
  <div class="form-group row">
    <label for="nro_orden" class="col-sm-2 col-form-label">Nro_orden:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nro_orden" name="Nro_orden">
    </div>
  </div>
  <div class="form-group row">
    <label for="cliente" class="col-sm-2 col-form-label">Cliente:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Cliente" name="Cliente">
    </div>
  </div>
  <div class="form-group row">
    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Cantidad" name="Cantidad">
    </div>
  </div>
  <div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Descripcion" name="Descripcion">
    </div>
  </div>
  <div class="form-group row">
    <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Peso" name="Peso">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
      
    </div>
  </div>
</form>

</body>


</html>


