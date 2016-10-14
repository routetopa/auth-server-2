<div id="logout_modal" class="modal">
    <div class="modal-content">
        <h4>Logout</h4>
        <p>Are you sure you want to log out?</p>
    </div>
    <div class="modal-footer">
        <form method="POST" action="/logout">
            {{ csrf_field() }}
            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Logout</button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
        </form>
    </div>
</div>