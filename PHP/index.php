<?php
session_start();

?>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<div id="Main">
    <div id="Menu">
        <form method="post" action="Action.php">
            <h1>choisissez votre classe</h1>

            <table border="1" cellspacing="0" cellpadding="0" style="width: 482px; height: 85px;">
                <tbody>
                <tr>
                    <td width="110" valign="top">
                        <p>Classes</p>
                    </td>
                    <td width="110" valign="top">
                        <p>Warrior</p>
                    </td>
                    <td width="110" valign="top">
                        <p>Mage</p>
                    </td>
                    <td width="110" valign="top">
                        <p>Clerk</p>
                    </td>
                </tr>
                <tr>
                    <td width="110" valign="top">
                        <p>Attaque</p>
                    </td>
                    <td width="110" valign="top">
                        <p>10</p>
                    </td>
                    <td width="110" valign="top">
                        <p>8</p>
                    </td>
                    <td width="110" valign="top">
                        <p>9</p>
                    </td>
                </tr>
                <tr>
                    <td width="110" valign="top">
                        <p>Defense</p>
                    </td>
                    <td width="110" valign="top">
                        <p>4</p>
                    </td>
                    <td width="110" valign="top">
                        <p>3</p>
                    </td>
                    <td width="110" valign="top">
                        <p>3</p>
                    </td>
                </tr>
                <tr>
                    <td width="110" valign="top">
                        <p>PV</p>
                    </td>
                    <td width="110" valign="top">
                        <p>10</p>
                    </td>
                    <td width="110" valign="top">
                        <p>6</p>
                    </td>
                    <td width="110" valign="top">
                        <p>8</p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tr>
                    <td>
                        <input type="radio" required name="class" value="Warrior"> Warrior
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" required name="class" value="Mage"> Mage
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" required name="class" value="Clerk"> Clerk
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="SubmitClass">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="Combat">
        <form method="post" action="Action.php">
            <input type="text" disabled>
            <input type = "text" disabled>
        </form>
    </div>
</div>


</body>

</html>

