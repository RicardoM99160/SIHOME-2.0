<script>
    function modoOscuro()
            {
                document.body.classList.toggle('dark');
                document.getElementById('switch').classList.toggle('active');
                <?php $_SESSION['AAAAAA'] = 'dark';?>
                if (document.cookie.match(/^(.*;)?\s*cookie_modo\s*=\s*[^;]+(.*)?$/) == null)
                {
                    document.cookie = "cookie_modo=1";
                }
                else
                {
                    document.cookie = "cookie_modo=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
                }
            }

    function checkModoOscuro()
            {
                if (document.cookie.match(/^(.*;)?\s*cookie_modo\s*=\s*[^;]+(.*)?$/) == null)
                {
                    
                }
                else
                {
                    document.body.classList.toggle('dark');
                    document.getElementById('switch').classList.toggle('active');
                }
            }
</script>