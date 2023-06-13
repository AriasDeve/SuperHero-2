<h1 class="text-center text-md"><?=$titulo?></h1>

<table class="table table-border mt-3">
  <colgroup>
  <col style='width: 5%'>
  <col style='width: 35%'>
  <col style='width: 15%'>
  <col style='width: 25%'>
  <col style='width: 10%'>
  <col style='width: 10%'>
  
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Race</th>
      <th>Alignment	</th>
      <th>height</th>
    </tr>
  </thead>
  <tbody>    
    <?php foreach($datos as $registro):?>      
      <tr>
        <td><?=$registro['id']?></td>
        <td><?=$registro['superhero_name']?></td>
        <td><?=$registro['gender']?></td>
        <td><?=$registro['race']?></td>
        <td class="text-end"><?=$registro['alignment']?></td>
        <td class="text-end"><?=$registro['height_cm']?></td>
      </tr>
    <?php endforeach?>
  </tbody>
</table>

