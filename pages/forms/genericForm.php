<?php

// entitlement guard

// if existing entity:
  // if form not submitted:
    // fetch entity details by query id
    // store details in post
  // end if
// end if
// if query readonly set:
  // set readonly to readonly query value
// end if
// if form submitted:
  // foreach req field:
    // if no value for req field:
      // set error for field
    // end if
  // end foreach
  // if no errors:
    // if existing entity:
      // entity total update
    // else
      // create new entity with form field values
    // end if
    // redirect to readonly form
  // end if
// end if

// form header
// form
  // include form fields (<fs>)
  // <fs> form buttons
// end form
