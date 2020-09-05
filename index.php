<?php

# here we serve up the built vue app's dist/ folder
# TODO: check that this file exists before serving it up, if not remind dev to run `npm run build` in client directory
require 'client/dist/index.html';