<?php echo $this->topNavigation('my-placement'); ?>

<div class="row content  my_placement col s12">
    <h1>MY PLACEMENT</h1>
    <div class="row">
        <table class="ads_list">
            <tbody>
                <?php foreach ($result as $k=>$item): ?>
                    <tr>
                        <td class="name"><?php echo ($k+1); ?>. <?php echo $item['name']; ?></td>
                        <td class="status">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" data-id="<?php echo $item['original_id']; ?>" <?php if($item['status']==1) echo 'checked'?>>
                                    <span class="lever"></span>
                                </label>
                            </div>

                        </td>
                        <td class="edit">
                            <a href="admin.php?page=my_placement&id=<?php echo $item['original_id']; ?>">
                                <i class="material-icons">mode_edit</i> <span>Edit</span>
                            </a>
                        </td>
                        <td class="delete">
                            <a href="#" data-id="<?php echo $item['original_id']; ?>">
                                <i class="material-icons">delete</i> <span>Delete</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <ul class="pagination">
            <li class="disabled"><a href="#!" class="btn">PREV</a></li>
            <li class="waves-effect active"><a href="#!"></a></li>
            <li class="waves-effect"><a href="#!"></a></li>
            <li class="waves-effect"><a href="#!"></a></li>
            <li class="waves-effect"><a href="#!"></a></li>
            <li class="waves-effect"><a href="#!"></a></li>
            <li><a href="#!" class="btn">NEXT</a></li>
        </ul>

    </div>
</div>

<button data-target="modal1" id="modal_click" style="display: none;"></button>


