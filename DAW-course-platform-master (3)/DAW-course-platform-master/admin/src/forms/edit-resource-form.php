<div class="alert"></div>
<div class="body__container__form">
    <div class="container__form">
        <form class="form__data" id="formResources" enctype="multipart/form-data">
            <fieldset>
                <legend id="legendFormResource">Add resource</legend>
                <div class="data__fields">
                    <div class="fields">
                        <label id="labelSrc" for="resourceUrl" >Source:</label>
                        <input type="file" name="resourceUrl" id="resourceUrl" >
                    </div>

                    <div class="fields">
                        <label for="resourceName">Name:</label>
                        <input type="text" name="resourceName" id="resourceName" placeholder="Title"
                            value="<?php echo (isset($course['resourceName']))?$course['resourceName']:""; ?>">
                    </div>
                    
                    <div class="fields">
                    <label for="resourceType">Type:</label>
                        <select id="resourceType" name="resourceType">
                            <option value="PDF">PDF</option>
                            <option value="IMAGE">IMAGE</option>
                            <option value="VIDEO">VIDEO</option>
                        </select>
                    </div>
                </div>
                <div class="btn__container">
                    <button type="submit" name="addResource" value="addResource" id="addResource"
                        class="btn__submit btn__save btn__small">ADD</button>
                    <button type="submit" name="cancelResource" value="cancelResource" id="cancelResource"
                        class="btn__submit btn__cancel btn__small">CANCEL</button>
                    <button type="submit" name="deleteResource" value="deleteResource" id="deleteResource"
                        class="btn__submit btn__disabled btn__small" disabled>DELETE</button>
                </div>
                <input type="hidden" value="<?php echo $course['id']; ?>" name="courseId" />
                <input id="resourceId" type="hidden" name="resourceId" />
            </fieldset>
        </form>
    </div>
</div>