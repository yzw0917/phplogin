<html>
<head>
    <title>add中的标题头</title>
</head>
<body>
<center>
    <?php include_once "menu.php"; ?>
    <h3>menu下的标题</h3>

    <form id="addstu" name="addstu" method="post" action="action.php?action=add">
        <table>
            <tr>
                <td>����</td>
                <td><input id="name" name="name" type="text"/></td>

            </tr>
            <tr>
                <td>�Ա�</td>
                <td><input type="radio" name="sex" value="m"/>&nbsp;��
                    <input type="radio" name="sex" value="w"/>&nbsp;Ů
                </td>
            </tr>
            <tr>
                <td>����</td>
                <td><input type="text" name="age" id="age"/></td>
            </tr>
            <tr>
                <td>�༶</td>
                <td><input id="classid" name="classid" type="text"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="����"/>&nbsp;&nbsp;
                    <input type="reset" value="����"/>
                </td>
            </tr>
        </table>

    </form>
</center>
</body>
</html>

