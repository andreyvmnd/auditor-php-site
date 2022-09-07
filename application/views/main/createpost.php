<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <? if (isset($idTest)): ?>
                                <form action="/createpost" method="post">
                                    <p><b>Введіть назву компанії:</b></p>
                                    <p><input class="form-control" type="text" name="company" placeholder="Назва компанії"></p>

                                    <?
                                        $quest = require 'application/config/tests/'.$namefile.'.php';

                                        foreach ($quest as $blockID => $blockARRAY) {
                                            echo "<br><p><b><h5>$blockARRAY[gname]</h5></b></p>";  //Название группы вопросов

                                            foreach ($blockARRAY["quest"] as $voteID => $voteARRAY) {
                                                echo "<p style='margin-left: 20px;'><b>$voteARRAY[name]</b></p>";  //Вопрос

                                                foreach ($voteARRAY["variants"] as $varID => $varARRAY) {
                                                    echo "<p style='margin-left: 30px;'><input name='".$blockID."_".$voteID."' type='radio' value='$varARRAY[score]'>$varARRAY[name]</p>"; //Варианты ответа
                                                }
                                            }
                                        }
                                    ?>

                                    <button type="submit" class="btn btn-primary btn-block">Результат опитування</button>
                                </form>
                        <? else: ?>
                            <div style='padding: 1rem; margin-bottom: 1rem!important; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;'>
                                <h4><a href='/createpost/1'>Базовий рівень</a></h4>
                                <span>Для користувачів, які не знайомі з аспектами забезпечення інформаційної безпеки</span>
                            </div>
                            <div style='padding: 1rem; margin-bottom: 1rem!important; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;'>
                                <h4><a href='/createpost/2'>Підвищений рівень</a></h4>
                                <span>Для користувачів, які ознайомлені з аспектами забезпечення інформаційної безпеки</span>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>