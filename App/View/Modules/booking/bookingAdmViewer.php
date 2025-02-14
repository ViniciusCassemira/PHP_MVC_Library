<?php
    include "view/header.php";
?>

<h2 id="bookings_title">Bookings</h2>

<table class="tableView">
    <thead>
        <tr>
           <th id="bookings_book_table">Book</th> 
           <th id="bookings_user_table">Users</th> 
           <th id="bookings_start_table">Start date</th> 
           <th id="bookings_return_table">Return date</th> 
           <th id="bookings_status_table">Status</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($result as $item){
                echo "<tr>";
                    echo "<td>{$item->book_description}</td>";
                    echo "<td>{$item->user_name}</td>";
                    echo "<td>{$item->booking_date}</td>";
                    echo "<td>{$item->return_date}</td>";
                    echo "<td>{$item->status}</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

</div>

<?php
    include "view/footer.php";
?>