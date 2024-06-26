<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Raphael must be included before justgage -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    document.querySelectorAll('select[multiple]').forEach((el)=>{
        new TomSelect(el, {
            create: false,
            plugins: {
                remove_button:{
                    title:'Remove this item',
                }
            },
        })
    });
</script>

@livewireScripts()
</body>
</html>
