document.addEventListener('DOMContentLoaded',function(){
   fetch('allSquad.php').then(onResponse).then(tabSquad);
   fetch('richiestePartite.php').then(onResponse).then(tabRic);
},false);

function onResponse(response){
    return response.json();
}

function tabSquad(json){

    let form=document.getElementById('form-sc');
    let table=document.createElement('table');
    table.className='table';
    table.id='table';

    let riga= document.createElement('tr');

    let all = document.createElement('th');
    all.innerText='Allenatore';
    riga.appendChild(all);

    let sq = document.createElement('th');
    sq.innerText='Squadra';
    riga.appendChild(sq);

    table.appendChild(riga);

    for(let i=0;i<json.length;i++){
        let tr=document.createElement('tr');

        let tdn1=document.createElement('td');
        tdn1.innerText = json[i].allenatore;
        tr.appendChild(tdn1);

        let tdn=document.createElement('td');
        tdn.innerText = json[i].nome;
        tr.appendChild(tdn);

        table.appendChild(tr);
    }

    form.appendChild(table);
}

function tabRic(json){
    console.log(json);

    let formsc2=document.getElementById('form-sc2');

    let table=document.createElement('table');
    table.className='table';
    table.id='table';

    let riga= document.createElement('tr');

    let sq = document.createElement('th');
    sq.innerText='Squadra';
    riga.appendChild(sq);

    let nome = document.createElement('th');
    nome.innerText='Allenatore';
    riga.appendChild(nome);

    table.appendChild(riga);
    for(let i =0;i<json.length;i++){
        let tr=document.createElement('tr');

        let tdn1=document.createElement('td');
        tdn1.innerText = json[i].sq1;
        tr.appendChild(tdn1);

        let all=document.createElement('td');
        all.innerText=json[i].allenatore;
        tr.appendChild(all);

        let box=document.createElement('td');
        tr.appendChild(box);

        let form= document.createElement('form');
        form.method='post';

        let chiave = document.createElement('input');
        chiave.id =i;
        chiave.name ="chiave";
        chiave.value=json[i].keyG;
        chiave.type='hidden';
        form.appendChild(chiave);

        let accetta = document.createElement('input');
        accetta.name='accetta';
        accetta.id=i;
        accetta.value="Accetta";
        accetta.type="submit";
        form.appendChild(accetta);

        let rifiuta = document.createElement('input');
        rifiuta.name='rifiuta';
        rifiuta.id=i;
        rifiuta.value="Rifiuta";
        rifiuta.type="submit";
        form.appendChild(rifiuta);
        box.appendChild(form);
        
        table.appendChild(tr);
    }
    formsc2.append(table);
}