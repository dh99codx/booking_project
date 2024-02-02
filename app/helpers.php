<?php

function Role_name($role_id)
{
    $role = \Spatie\Permission\Models\Role::find($role_id);


    if (!empty($role_id))
    {
        ?>
          <?php echo $role->name ?>
        <?php
    }
}

function User_name_and_email($model_id)
{

    $user = \App\Models\User::find($model_id);

    if (!empty($user))
    {
        ?>
        <?php echo $user->given_name ?>  (<?php echo $user->email ?>)
        <?php
    }

}































