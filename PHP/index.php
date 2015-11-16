<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../JS/Atelier.js"></script>
    <link rel="stylesheet" href="../CSS/Style.css"/>
</head>

<body>

<div id="Main">
    <div id="Menu">
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
                    <button type="button" onclick="AjaxClass()"> submit</button>
                </td>
            </tr>
        </table>
    </div>

    <div id="Combat" style="display: none">
        <table>
            <tr>
                <td>
                    <h3>Vous</h3>
                    Attaque: <input type="text" disabled id="P_Att" name="P_Att">
                </td>
                <td>
                    <h3>Monstre</h3>
                    Attaque: <input type="text" disabled id="M_Att" name="M_Att">
                </td>
            </tr>
            <tr>
                <td>
                    Defense : <input type="text" disabled id="P_Def" name="P_Def">
                </td>
                <td>
                    Defense : <input type="text" disabled id="M_Def" name="M_Def">
                </td>
            </tr>
            <tr>
                <td>
                    Vie : <input type="text" disabled id="P_Vie" name="P_Vie">
                </td>
                <td>
                    Vie : <input type="text" disabled id="M_Vie" name="M_Vie">
                </td>
            </tr>
            <tr>
                <td>
                    Gold : <input type="text" disabled id="P_Gold" name="P_Gold">
                </td>
            </tr>
        </table>
        <br>
        <input type="button" name="btn_Att" value="Attaquer" onclick="AjaxAttack()" id="Attack">
        <input type="button" name="btn_Def" value="Defendre" onclick="AjaxDefense()" id="Defense">
        <input type="button" name="btn_Flee" value="Fuir" onclick="AjaxFlee()" id="Flee">
        <input type="button" name="btn_Spec" value="Attaque Special" onclick="AjaxSpecial()" id="special">
        <input type="button" name="btn_Market" value="Market" onclick="AjaxMarket()"id="btn_Market">
        <input type="button" name="btn_Combat" value="Combat" onclick="AjaxCombat()"id="btn_Combat">

    </div>
</div>


</body>

</html>
