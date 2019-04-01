import csv
import qrcode
import hashlib

#QRcode::png($name."\n".$rollno."\n".md5($roll_number.$GLOBALS['encryption_key']))

encryption_key = "BatMaN!007GurUjI";
auto_incr_start = 122
try:
    from PIL import Image
except ImportError:
    import Image

filename  = 'input_keys_to_qr_module.txt'
writefile = 'importing_to_db.csv'
fwrite_ptr = open(writefile,'w')
with open(filename) as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:

        try:

            data = ""
            hash_encode_string = row[1].strip() + encryption_key.strip()
            print(hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest())

            data = row[0].strip() + "\n" + row[1].strip() + "\n" +  hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest()

            qr = qrcode.QRCode(
                version=1,
                error_correction=qrcode.constants.ERROR_CORRECT_L,
                box_size=10,
                border=4,
            )

            qr.add_data(data)
            qr.make(fit=True)
            img = qr.make_image(fill_color="black", back_color="white")
#            file_name = row[1].strip().split(' ')[0].title() + '_' + '.png'  #Professor
            print(row[0])
            file_name = row[0].strip() + '.png'	#keys
            image_file = open(file_name,
                              'wb')  # will open the file, if file does not exist, it will be created and opened.
            img.save(image_file)  # write qrcode encoded data to the image file.
            image_file.close()  # close the opened file handler.
            print(file_name+','+hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest()+'\n')
            text_write = str(str(auto_incr_start) + ',' + file_name.split('.')[0]+','+hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest()+','+ '2019-03-13 17:32:37' + ',' + '1' + '\n')
            auto_incr_start+=1
            fwrite_ptr.write(text_write)
            
        except Exception as e:
            print(e)
            print("Error")

fwrite_ptr.close()
