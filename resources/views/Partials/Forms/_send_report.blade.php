<div class="send-report-wrapper">
    <form id="send-report-form" class="form-inline">
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
        </div>
        <button type="button" id="toggle-send-report" class="btn btn-primary">Send Report</button>

        {!! csrf_field() !!}
    </form>
</div>
