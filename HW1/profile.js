document.addEventListener('DOMContentLoaded',function(){
    fetch('scambiProposti.php').then(onResponse).then(tabScambiProp);
    fetch('scambi2.php').then(onResponse).then(tabScam2);

   
},false);

function onResponse(response){
    return response.json();
}

function tabScambiProp(json){

    let form=document.getElementById('form-sc');
    let table=document.createElement('table');
    table.className='table';
    table.id='table';

    let riga= document.createElement('tr');

    let nome1 = document.createElement('th');
    nome1.innerText='Nome';
    riga.appendChild(nome1);

    let cognome1 = document.createElement('th');
    cognome1.innerText='Cognome';
    riga.appendChild(cognome1);

    let nome = document.createElement('th');
    nome.innerText='Nome';
    riga.appendChild(nome);

    let cognome = document.createElement('th');
    cognome.innerText='Cognome';
    riga.appendChild(cognome);

    let squadra = document.createElement('th');
    squadra.innerText='Squadra';
    riga.appendChild(squadra);

    let allenatore = document.createElement('th');
    allenatore.innerText='Allenatore';
    riga.appendChild(allenatore);
    table.appendChild(riga);

    for(let i=0;i<json.length;i++){

        let tr=document.createElement('tr');

        let tdn1=document.createElement('td');
        tdn1.innerText = json[i].nome1;
        tr.appendChild(tdn1);

        let tdc1=document.createElement('td');
        tdc1.innerText = json[i].cognome1;
        tr.appendChild(tdc1);

        let tdn=document.createElement('td');
        tdn.innerText = json[i].nome;
        tr.appendChild(tdn);

        let tdc=document.createElement('td');
        tdc.innerText = json[i].cognome;
        tr.appendChild(tdc);

        let sq=document.createElement('td');
        sq.innerText=json[i].squadraN;
        tr.appendChild(sq);

        let all=document.createElement('td');
        all.innerText=json[i].allenatore;
        tr.appendChild(all);

        table.appendChild(tr);
    }

    form.appendChild(table);
}

function tabScam2(json){
    console.log(json);

    let form=document.getElementById('form-sc2');
    let table=document.createElement('table');
    table.className='table';
    table.id='table';

    let riga= document.createElement('tr');

    let nome = document.createElement('th');
    nome.innerText='Nome';
    riga.appendChild(nome);

    let cognome = document.createElement('th');
    cognome.innerText='Cognome';
    riga.appendChild(cognome);

    let squadra = document.createElement('th');
    squadra.innerText='Squadra';
    riga.appendChild(squadra);

    let nome1 = document.createElement('th');
    nome1.innerText='Nome';
    riga.appendChild(nome1);

    let cognome1 = document.createElement('th');
    cognome1.innerText='Cognome';
    riga.appendChild(cognome1);

    

    let allenatore = document.createElement('th');
    allenatore.innerText='Allenatore';
    riga.appendChild(allenatore);
    table.appendChild(riga);


    for(let i =0;i<json.length;i++){
        
        let tr=document.createElement('tr');

        let tdn1=document.createElement('td');
        tdn1.innerText = json[i].nome1;
        tr.appendChild(tdn1);

        let tdc1=document.createElement('td');
        tdc1.innerText = json[i].cognome1;
        tr.appendChild(tdc1);

        let sq=document.createElement('td');
        sq.innerText=json[i].squadraN;
        tr.appendChild(sq);

        let tdn=document.createElement('td');
        tdn.innerText = json[i].nome;
        tr.appendChild(tdn);

        let tdc=document.createElement('td');
        tdc.innerText = json[i].cognome;
        tr.appendChild(tdc);

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

    form.appendChild(table);
}