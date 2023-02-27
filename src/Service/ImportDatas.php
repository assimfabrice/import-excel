<?php
namespace App\Service;

use DateTime;
use App\Entity\Datas;
use Shuchkin\SimpleXLSX;
use App\Repository\DatasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ImportDatas
{
    /**
     * @param targetDirectory
     * @var string
     */
    private $targetDirectory; 
    /**
     * @param entityManagerInterface
     * */   
    private $entityManagerInterface;
    /**
     * @param datasRepository
     * @var Object|null
     */
    private $datasRepository;
    private $doctrine;
    const TABLE = 'datas';

    public function __construct($targetDirectory, EntityManagerInterface $entityManagerInterface, DatasRepository $datasRepository, ManagerRegistry $doctrine)
    {
        $this->targetDirectory = $targetDirectory;
        $this->entityManagerInterface = $entityManagerInterface;
        $this->datasRepository = $datasRepository;
        $this->doctrine = $doctrine;
    }
    /**
     * @return String Returns string the name of file uploaded
     */
    public function upload(UploadedFile $file)
    {
        try
        {                             
            //First truncate table 'import'
            $this->truncate();
            //get file from tmp
            $tmpFileName = $file->getPathName();
            //file name original
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            //name of file after upload
            $fileName = $originalFilename.'-'.uniqid().'.'.$file->guessExtension();

            if ($xlsx = SimpleXLSX::parse($tmpFileName)) {
                foreach( $xlsx->rows() as $key => $value) {
                    if ($key != 0) {
                        $datas = new Datas();
                        if($value[0] != '' && is_string($value[0]))
                            $datas->setCompteAffaire($value[0]);
                        else $datas->setCompteAffaire('');
                        if($value[1] != '' && is_string($value[1]))
                            $datas->setCompteEvenement($value[1]);
                        else $datas->setCompteEvenement('');
                        if($value[2] != '' && is_string($value[2]))
                            $datas->setCompteDernierEvenement($value[2]);                        
                        else $datas->setCompteDernierEvenement('');                        
                        if($value[3] != '' && is_int($value[3]))
                            $datas->setNumeroDeFiche(intval($value[3]));
                        else $datas->setNumeroDeFiche(intval(0));
                        if($value[4] != '')
                            $datas->setLibelleCivilite($value[4]); 
                        else $datas->setLibelleCivilite(''); 
                        if($value[5] != '')
                            $datas->setProprieteActuelDuVehicule($value[5]);
                        else $datas->setProprieteActuelDuVehicule('');
                        if($value[6] != '' && is_string($value[6]))
                            $datas->setNom($value[6]);
                        else $datas->setNom('');
                        if($value[7] != '' && is_string($value[7]))
                            $datas->setPrenom($value[7]);
                        else $datas->setPrenom('');
                        if($value[8] != '' && is_string($value[8]))
                            $datas->setNumeroEtNomDeLaVoie($value[8]);
                        else $datas->setNumeroEtNomDeLaVoie('');
                        if($value[9] != '')
                            $datas->setComplementAdresse($value[9]);                            
                        else $datas->setComplementAdresse('');                            
                        if($value[10] != '' && is_int($value[10]))
                            $datas->setCodePostal($value[10]);
                        else $datas->setCodePostal(0);
                        if($value[11] != '' && is_string($value[11]))
                            $datas->setVille($value[11]);                        
                        else $datas->setVille('');                                  
                        if ($value[12] != '') {
                            $datas->setTelephoneDomicile($value[12]);                        
                        }else{
                            $datas->setTelephoneDomicile('');                        
                        }
                        if ($value[13] != '')
                            $datas->setTelephonePortable($value[13]);
                        else $datas->setTelephonePortable('');
                        if ( $value[14] != '')
                            $datas->setTelephoneJob($value[14]);
                        else $datas->setTelephoneJob('');
                        if ($value[15] != '') 
                            $datas->setEmail($value[15]);           
                        else $datas->setEmail('');           
                        if($value[16] != '')             
                            $datas->setDateDeMiseEnCirculation(new DateTime($value[16]));                        
                        else $datas->setDateDeMiseEnCirculation(new DateTime('now'));                        
                        if( $value[17] != '')
                            $datas->setDateAchat(new DateTime($value[17]));
                        else $datas->setDateAchat(new DateTime('now'));
                        if($value[18] != '')
                            $datas->setDateDernierEvenement(new DateTime($value[18]));
                        else $datas->setDateDernierEvenement(new DateTime('now'));
                        if($value[19] != '' && is_string($value[19]))
                            $datas->setLibelleMarque($value[19]);
                        else $datas->setLibelleMarque('');
                        if ($value[20] != '') 
                            $datas->setLibelleModele($value[20]);
                        if ($value[21] != '') 
                            $datas->setVersion($value[21]);
                        if ($value[22] != '' && is_string($value[22]))
                            $datas->setVIN($value[22]);
                        else $datas->setVIN('');
                        if ($value[23] != '' && is_string($value[23]))
                            $datas->setImmatriculation($value[23]);
                        else $datas->setImmatriculation('');
                        if( $value[24] != '' && is_string($value[24]))
                            $datas->setTypeDeProspect($value[24]);                                                
                        else $datas->setTypeDeProspect(''); 
                        if( $value[25] != '' && is_int($value[25]))
                            $datas->setKilometrage(intval($value[25]));
                        else $datas->setKilometrage(0);
                        if( $value[26] != '' && is_string($value[26]))
                            $datas->setLibelleEnergie($value[26]);
                        else $datas->setLibelleEnergie('');                        
                        if( $value[27] != '')
                            $datas->setVendeurVN($value[27]);                            
                        else $datas->setVendeurVN('');     
                        if( $value[28] != '')                            
                            $datas->setVendeurVO($value[28]);                            
                        else $datas->setVendeurVO('');                            
                        if( $value[29] != '')                            
                            $datas->setCommentaireDeFacturation($value[29]);
                        else $datas->setCommentaireDeFacturation('');
                        if( $value[30] != '')
                            $datas->setTypeVNVO($value[30]); 
                        else $datas->setTypeVNVO(''); 
                        if( $value[31] != '')
                            $datas->setNumeroDeDossierVN($value[31]); 
                        else $datas->setNumeroDeDossierVN('');                        
                        if( $value[32] != '')
                            $datas->setIntermediaireDeVente($value[32]);
                        else $datas->setIntermediaireDeVente('');
                        if( $value[33] != '') 
                            $datas->setDateEvenement(new DateTime($value[33]));
                        else $datas->setDateEvenement(new DateTime('now'));
                        if( $value[34] != '')
                            $datas->setOrigineEvenement($value[34]); 
                        else $datas->setOrigineEvenement('');
                        //persist data 
                        $this->entityManagerInterface->persist($datas);                        
                    }
                    //save datas in table
                    $this->entityManagerInterface->flush();
                }
            }
        } catch (FileException $e) {
            
        }
        //move the file excel to uploads\brochures
        $file->move($this->getTargetDirectory(), $fileName);
        return $fileName;
 
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    private function truncate()
    {
        $connection = $this->entityManagerInterface->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeUpdate($platform->getTruncateTableSQL(self::TABLE, true));
    }
}