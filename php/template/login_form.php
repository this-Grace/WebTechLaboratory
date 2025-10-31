<h2><?php echo $templateParams["titolopagina"]; ?></h2>
        <form action="#">
            <ul>
                <li>
                    <label for="username"><?php echo $templateParams["username"]; ?></label><input type="text" id="username" name="username" />
                </li>
                <li>
                    <label for="password"><?php echo $templateParams["password"]; ?></label><input type="password" id="password" name="password" />
                </li>
                <li>
                    <input type="submit" name="submit" value="<?php echo $templateParams["submit"]?>" />
                </li>
            </ul>
        </form>