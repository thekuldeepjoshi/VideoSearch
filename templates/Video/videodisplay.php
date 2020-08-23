<?php

/**
 * Description of videodisplay
 *
 * @author Kuldeep Joshi
 * Created on 21/08/2020
 */
?>
<!DOCTYPE html>
<html>
    <body>
        <main class="main">
            <div class="container"> 
                <div class="content">
                    <div class="row">
                        <div class="column">
                            <?php
                            echo $this->Form->create(NULL, array('url' => '/Video'));
                            echo $this->Form->input('VideoSearch',array('class' => 'form-control','placeholder'=>'Search','required'));
                            echo $this->Form->button(' ',array('class' => 'fa fa-search'));
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
