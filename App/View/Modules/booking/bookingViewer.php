<?php
    include "view/header.php";
?>

<h2 id="bookings_title">Bookings</h2>

<a href="/booking/register">
    <button id="bookings_booking_button">
        Schedule book
    </button>
</a>

<table class="tableView">
    <thead>
        <tr>
           <th id="bookings_book_table">Book</th> 
           <th id="bookings_start_table">Start date</th> 
           <th id="bookings_return_table">Return date</th> 
           <th id="bookings_status_table">Status</th> 
           <th id="bookings_action_table">Action</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($result as $item){
                echo "<tr>";
                    echo "<td>{$item->description}</td>";
                    echo "<td>{$item->booking_date}</td>";
                    echo "<td>{$item->return_date}</td>";
                    echo "<td>{$item->status}</td>";
                    if(empty($item->return_date)){
                        echo "<td>
                                <a href = '/booking/return?id_booking={$item->id_booking}'>
                                    <button id='bookings_return_button'>    
                                        Return book
                                    </button>
                                </a>
                            </td>";
                    };
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

</div>

<?php
    include "view/footer.php";
?>