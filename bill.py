import csv
from validate_email import validate_email
validemail = ['valid']
invalidmail = ['invalid']
def validateEmailId( email ):
  try:
    newemail = email.rsplit('@',1)[1];
  except :
    newemail = email
  
  if validate_email(email) != True and validate_email(email,check_mx=True) != True and validate_email(email,verify=True) != True:
    invalidmail.append(newemail);
    return False
 
  else :
  	
  	if newemail in validemail :
  	  return "Duplicate"

  	else :
  	  validemail.append(newemail);
  	  return True
 
with open('invalid.csv', 'rb') as csvfile:
 spamreader = csv.reader(csvfile, delimiter='\'', quotechar='|')
 
 for row in spamreader:
    print validateEmailId(row[0])

print invalidmail
print validemail                                                                                                                                                                                                                               