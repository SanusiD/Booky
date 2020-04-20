
    
    <form action="/todo/new" method="post">
        {{ csrf_field() }}

        <div class="name">
            <p>
                ToDo Name:
            </p>
            <input type="text" name="todoName" id="todoName" maxlength="20" placeholder="What is the name of the event?" required> 
        </div>

        <input type="submit">
    </form>

</div>
