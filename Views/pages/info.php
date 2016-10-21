<?php
foreach (ViewGetTools::GetInfo() as $item) {
    echo "<h4>" . $item['title'] . "</h4><br><i>" . $item['contact'] . "</i><br>" . $item['inform'] . '<br></pre>';
}
?>