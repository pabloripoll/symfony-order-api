<?php

namespace Container2a8BWtf;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder23ec4 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer4e52c = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties7c3ab = [
        
    ];

    public function getConnection()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getConnection', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getMetadataFactory', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getExpressionBuilder', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'beginTransaction', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getCache', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getCache();
    }

    public function transactional($func)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'transactional', array('func' => $func), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->transactional($func);
    }

    public function commit()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'commit', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->commit();
    }

    public function rollback()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'rollback', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getClassMetadata', array('className' => $className), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'createQuery', array('dql' => $dql), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'createNamedQuery', array('name' => $name), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'createQueryBuilder', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'flush', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'clear', array('entityName' => $entityName), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->clear($entityName);
    }

    public function close()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'close', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->close();
    }

    public function persist($entity)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'persist', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'remove', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'refresh', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'detach', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'merge', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getRepository', array('entityName' => $entityName), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'contains', array('entity' => $entity), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getEventManager', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getConfiguration', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'isOpen', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getUnitOfWork', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getProxyFactory', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'initializeObject', array('obj' => $obj), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'getFilters', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'isFiltersStateClean', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'hasFilters', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return $this->valueHolder23ec4->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer4e52c = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder23ec4) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder23ec4 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder23ec4->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, '__get', ['name' => $name], $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        if (isset(self::$publicProperties7c3ab[$name])) {
            return $this->valueHolder23ec4->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder23ec4;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder23ec4;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder23ec4;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder23ec4;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, '__isset', array('name' => $name), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder23ec4;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder23ec4;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, '__unset', array('name' => $name), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder23ec4;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder23ec4;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, '__clone', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        $this->valueHolder23ec4 = clone $this->valueHolder23ec4;
    }

    public function __sleep()
    {
        $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, '__sleep', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;

        return array('valueHolder23ec4');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer4e52c = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer4e52c;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer4e52c && ($this->initializer4e52c->__invoke($valueHolder23ec4, $this, 'initializeProxy', array(), $this->initializer4e52c) || 1) && $this->valueHolder23ec4 = $valueHolder23ec4;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder23ec4;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder23ec4;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
