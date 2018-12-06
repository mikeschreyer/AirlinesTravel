<?php
$urlToRestApi = $this->Url->build('/api/modele', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('modele/index2', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default modele-content">
            <div class="panel-heading">Modele avion<a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add modele avion</h2>
                <form class="form" id="modeleAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="modeleAction('add')">Add modele</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add modele" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit modele avion</h2>
                <form class="form" id="modeleEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="nameEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="modeleAction('edit')">Update modele</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update modele" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="modeleData">
                    <?php
                    $count = 0;
                    foreach ($modele as $modele): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $modele['name']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? modeleAction('delete', '<?php echo $modele['id']; ?>') : false;"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editmodele('<?php echo $modele['id']; ?>')"></a>

                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    <tr><td colspan="5">No modele(s) found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

