<style>
    @import url('https://fonts.googleapis.com/css2?family=Galada&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    nav {
        width: 100%;
        height: 8vh;
        display: flex;
    }

    .left {
        width: 25%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .center {
        width: 50%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        font-family: 'Courier New', Courier, monospace;
    }


    .center h3 {
        cursor: pointer;

    }

    .right {
        width: 25%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        gap: 20px;
    }

    .right i {
        cursor: pointer;
    }



</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<nav>
    <div class="left">
        <h2>Logo</h2>
    </div>
    <div class="center">
        <h3>Home</h3>
        <h3>About</h3>
        <h3>Contact</h3>
        <h3>Service</h3>
    </div>
    <div class="right">
        <i class="bi bi-cart"></i>
        <i class="bi bi-person-circle"></i>
    </div>
</nav>


