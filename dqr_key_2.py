import csv
import qrcode
import hashlib

#QRcode::png($name."\n".$rollno."\n".md5($roll_number.$GLOBALS['encryption_key']))

encryption_key = "BatMaN!007GurUjI";

try:
    from PIL import Image
except ImportError:
    import Image

filename  = 'key.csv'
with open(filename) as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:

        try:

            data = ""
            hash_encode_string = row[1].strip() + encryption_key.strip()
            print(hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest())

            data = row[0].strip() + "\n" + row[1].strip() + "\n" +  hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest()
            for i in range(3,4):
                print(i)
                qr = qrcode.QRCode(
                    version=1,
                    error_correction=qrcode.constants.ERROR_CORRECT_H,
                    box_size=i,
                    border=4,
                )

                qr.add_data(data)
                qr.make(fit=True)
            
                img = qr.make_image(fill_color="black", back_color="white")
                file_name = row[1].strip().split(' ')[0].title() + '_box_size_' + str(i) + '_.png'
                image_file = open(file_name,'wb')  # will open the file, if file does not exist, it will be created and opened.
                img.save(image_file)  # write qrcode encoded data to the image file.
                image_file.close()  # close the opened file handler.
        except Exception as e:
            print(e)
            print("Error")

