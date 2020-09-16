<form method="POST" novalidate>
  <fieldset <?php echo $errors->isEmpty() ? 'disabled' : '' ?>>
    <div class="container">
      <div class="row mt-3">
        <div class="col">
          <div class="floating-label-group">
            <input type="text" placeholder="First Name" id="firstName" name="firstName" value="<?php echo $post->firstName ?>">
            <label for="firstName">First Name</label>
            <p class="form-error"><?php echo $errors->firstName; ?></p>
          </div>
        </div>
        <div class="col">
          <div class="floating-label-group">
            <input type="text" placeholder="Last Name" id="lastName" name="lastName" value="<?php echo $post->lastName ?>">
            <label for="lastName">Last Name</label>
            <p class="form-error"><?php echo $errors->lastName; ?></p>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 col-md-6">
          <div class="floating-label-group">
            <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $post->email ?>">
            <label for="email">Email</label>
            <p class="form-error"><?php echo $errors->email; ?></p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="floating-label-group">
            <input type="email" placeholder="Confirm Email" id="emailConfirmation" name="emailConfirmation" value="<?php echo $post->emailConfirmation ?>">
            <label for="emailConfirmation">Confirm Email</label>
            <p class="form-error"><?php echo $errors->emailConfirmation; ?></p>
          </div>
        </div>
      </div>
      <div class="row mt-3 <?php echo $errors->isEmpty() ? 'd-none' : '' ?>">
        <div class="col">
          <div class="floating-label-group">
            <input type="password" placeholder="Password" id="password" name="password" value="">
            <label for="password">Password</label>
            <p class="form-error"><?php echo $errors->password; ?></p>
          </div>
        </div>
        <div class="col">
          <div class="floating-label-group">
            <input type="password" placeholder="Confirm Password" id="passwordConfirmation" name="passwordConfirmation" value="">
            <label for="passwordConfirmation">Confirm Password</label>
            <p class="form-error"><?php echo $errors->passwordConfirmation; ?></p>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 col-md-6">
          <div class="floating-label-group--radio">
            <p class="group-label">Gender</p>
            <?php $genders = ['male', 'female', 'other']; ?>
            <?php foreach ($genders as $gender) : ?>
              <input
                type="radio"
                id="gender"<?php echo cameltostr($gender) ?>
                name="gender"
                value="<?php echo $gender; ?>"
                <?php echo $post->gender === $gender ? 'checked' : ''; ?>
              />
              <label for="gender"<?php echo cameltostr($gender) ?>><?php echo cameltostr($gender) ?></label>
            <?php endforeach; ?>
            <p class="form-error"><?php echo $errors->gender; ?></p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="floating-label-group--select">
            <label for="department" class="group-label d-block">Department</label>
            <?php $departments = ['computerScience', 'biology', 'astronomy', 'chemistry']; ?>
            <select id="department" name="department" class="ml-3">
              <?php foreach ($departments as $department) : ?>
                <option
                  value="<?php echo $department; ?>"
                  <?php echo $post->department === $department ? 'selected' : '' ?>
                ><?php echo cameltostr($department); ?></option>
              <?php endforeach; ?>
            </select>
            <p class="form-error"><?php echo $errors->department; ?></p>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 col-md-6">
          <div class="floating-label-group--checkbox">
            <p class="group-label">Status</p>
            <?php $statuses = ['student', 'faculty', 'staff']; ?>
            <?php foreach ($statuses as $status) : ?>
              <input
                type="checkbox"
                id="status"<?php echo cameltostr($status) ?>
                name="status[]"
                value="<?php echo $status; ?>"
                <?php echo in_array($status, $post->status) ? 'checked' : ''; ?>
              />
              <label for="status"<?php echo cameltostr($status) ?>><?php echo cameltostr($status) ?></label>
            <?php endforeach; ?>
            <p class="form-error"><?php echo $errors->status; ?></p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="floating-label-group--checkbox">
            <p class="group-label">Terms & Policies</p>
            <input type="checkbox" id="termsAndPolicies" name="termsAndPolicies" value="true" <?php echo $post->termsAndPolicies ? 'checked' : '' ?>>
            <label for="termsAndPolicies">I agree to the <a href="#">terms and policies.</a></label>
            <p class="form-error"><?php echo $errors->termsAndPolicies; ?></p>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <button type="submit">Submit</button>
      </div>
    </div>
  </fieldset>
</form>