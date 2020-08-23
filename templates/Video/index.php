<?php
/**
 * Description of index
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
                <div class="content " >
                    
                    <?php
                    echo $this->Form->create(NULL, array('url' => '/Video'));
                    echo $this->Form->input('VideoSearch', array('class' => 'VideoSearch form-control', 'placeholder' => 'Search', 'required'));
                    echo $this->Form->button('', array('class' => 'fa fa-search'));
                    echo $this->Form->end();?>
                    <div class="videoSearchview">
                    <?php
                    if ($response != null) {

                        $apikey = 'AIzaSyDliyJ5AjeSRT26ncDNo9SYQCTXVjSuFm4';
                        $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $response . '&maxResults=6&key=' . $apikey;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_VERBOSE, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $json_response = curl_exec($ch);

                        curl_close($ch);
                        $data = json_decode($json_response);
                        $value = json_decode(json_encode($data), true);
//                                var_dump($value['items']);
                        foreach ($value['items'] as $key => $val) {
                            if ($value['items'][$key]['id']['kind'] == 'youtube#video') {
                                $videoId = $value['items'][$key]['id']['videoId'];
                                $title = $value['items'][$key]['snippet']['title'];
                                $description = $value['items'][$key]['snippet']['description'];
                                ?>
                                <iframe id="iframe" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" 
                                        data-autoplay-src="https://www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1" allowfullscreen=""></iframe> 
                    
                                        <?php
                                    }
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>