const save_data = async() => {
    const id_nama = document.querySelector('#username').value;
    const id_password = document.querySelector('#password').value;
    const id_umur = document.querySelector('#age').value;
    const id_title = document.querySelector('#title').value;
    const id_desk = document.querySelector('#desk').value;
        
    const raw_data_input = {
        raw_id_data_nama : id_nama,
        raw_id_data_password : id_password,
        raw_id_data_umur : id_umur,
        raw_id_data_title : id_title,
        raw_id_data_desk : id_desk
    }

    
    const wait_data = await fetch("simpan_data.php", {
        method: "POST",
        body: JSON.stringify(raw_data_input),
        headers: {
            "Content-Type": "application/json"
        }
    });

    const output_wait_data = await wait_data.json();

    const element_pesan = document.getElementById('status_pesan');

    element_pesan.innerText = output_wait_data.Status;

};