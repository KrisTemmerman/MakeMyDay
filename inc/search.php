<?php
/**
 * User: KrisTemmerman
 * Date: 19-apr-2010
 * Time: 17:44:21
 * To change this template use File | Settings | File Templates.
 *
 */
?>
<div id="searchbar">
    <input size="25" id="inputString" onkeyup="lookup(this.value);" type="text"/>
    <div id="suggestion" class="suggestionBox" style="display:none;">
       <div class="suggestionList" id="autoSuggestionList">
       </div>
    </div>
</div>