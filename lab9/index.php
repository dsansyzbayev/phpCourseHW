<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 9</title>
</head>
<body>
    <a href="#" onClick="javascript:changeBackGround();">Change Color</a>
    <a href="#" onClick="javascript:addTable();">Add Table</a>
    <a href="#" onClick="javascript:fillTable();">Fill Table</a>
    <script>
    
    var string = "Hello World";
    //alert(string);

    function sayHello()
    {
        var string = "Hello World";
        alert(string);

        f=function(){
            string = string + 'and in AnonymFunction';
            alert(string);
        }
        f();

    }
    sayHello();

    function changeBackGround()
    {
        if(document.body.style.backgroundColor=='black')
        {
            document.body.style.backgroundColor='white';
        }
        else
        {
            document.body.style.backgroundColor='black';
        }
        
    }

    function addTable()
    {
        var table=document.createElement('table');
        table.border='1';
        table.id='table-1';
        for(i=0; i<11; i++){
            row=document.createElement('tr');
            for(j=0; j<11;j++){
                cell=document.createElement('td');
                cell.innerHTML = 'X';
                row.appendChild(cell);    
            }
            table.appendChild(row);
        }
        document.body.appendChild(table);
    }

    function fillTable()
{   
    tables=document.getElementsByTagName('table');
    for(table of tables){
        i=0; j=0;
        setTimeout(fillTables,100);
    }

}

function fillTables()
{
    if(j==11){
        j=0;
        i++;
    }
    if(i==11){
        return;
    }

    table.childNodes[i].childNodes[j].innerHTML = i==j || i+j==10 ? 'X':'-';
    j++;
    setTimeout(fillTables,100);

}
    </script>
</body>
</html>