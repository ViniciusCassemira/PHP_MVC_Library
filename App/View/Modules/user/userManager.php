<?php
    include "view/header.php"; 
?>
    
   <h2 id="user_manager_title">
       Manager users
   </h2>
   
    <table class="tableView">
        <thead>
            <tr>
                <th id="user_manager_name_table">Name</th>
                <th id="user_manager_email_table">Email</th>
                <th id="user_manager_role_table">Role</th>
                <th id="user_manager_status_table">Status</th>
                <th id="user_manager_action_table">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $user){
                if($user->status == 'active'){
                    $futureStatus = 'Inactive';
                }else{
                    $futureStatus = 'Active';
                }

                if($user->id_role == 1){
                    $futureRole = 'Promote';
                }else{
                    $futureRole = 'Demote';
                }
                


            echo"<tr>";
            echo "<td>{$user->name}</td>";
            echo "<td>{$user->email}</td>";
            echo"<td>{$user->description}</td>";
            echo"<td>{$user->status}</td>";
            echo"<td>
                <a href='/user/manager/situation?id_user={$user->id_user}&status={$user->status}'>
                    <button class='user_manager_active_button'>{$futureStatus}</button>
                </a>

                <a href='/user/manager/position?id_user={$user->id_user}&id_role={$user->id_role}'>
                    <button class='user_manager_role_button'>{$futureRole}</button>
                </a>
                </td>";
            echo"</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
<?php include "view/footer.php"; ?>